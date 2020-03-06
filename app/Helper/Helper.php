<?php


namespace App\Helper;


use App\GroupingByCity;
use App\GroupingByCountry;
use App\GroupingByDistrict;
use App\SubscriberLocation;
use GuzzleHttp\Client;
use Spatie\Geocoder\Geocoder;
use Mapper;

class Helper
{
    /**
     * @param SubscriberLocation $subscriberLocation
     * @param string $country
     * @param int $countryId
     */
    public static function groupingByCity($subscriberLocation, $country, $countryId)
    {
        $subscriberGroupingCityLocation = $subscriberLocation->getGroupingCity($country);

        $client = new Client();

        foreach ( $subscriberGroupingCityLocation as $itemGroupingCityLocation ) {

            $city = GroupingByCity::getCity($itemGroupingCityLocation->city);

            if ( !empty($city) ) {

                if ( $city->total_of_subscribers != $itemGroupingCityLocation->total_of_subscribers ) {

                    $city->total_of_subscribers = $itemGroupingCityLocation->total_of_subscribers;
                    $city->save();

                    Helper::groupingByDistrict($subscriberLocation, $country, $itemGroupingCityLocation->city, $city->id);

                }

                continue;
            }

            $geocoder = new Geocoder($client);
            $geocoder->setApiKey(config('geocoder.key'));
            $geocoder->setLanguage('tr');
            $coordinates = $geocoder->getCoordinatesForAddress($country . ',' . $itemGroupingCityLocation->city);

            $groupingByCityCreate = GroupingByCity::create([
                'name'                 => $itemGroupingCityLocation->city,
                'country_id'           => $countryId,
                'total_of_subscribers' => $itemGroupingCityLocation->total_of_subscribers,
                'latitude'             => $coordinates['lat'],
                'longitude'            => $coordinates['lng']
            ]);

            Helper::groupingByDistrict($subscriberLocation, $country, $itemGroupingCityLocation->city, $groupingByCityCreate->id);
        }
    }

    /**
     * @param SubscriberLocation $subscriberLocation
     * @param string $country
     * @param string $city
     * @param int $cityId
     */
    public static function groupingByDistrict($subscriberLocation, $country, $city, $cityId)
    {
        $subscriberGroupingDistrictLocation = $subscriberLocation->getGroupingDistrict($country, $city);

        $client = new Client();

        foreach ( $subscriberGroupingDistrictLocation as $itemGroupingDistrictLocation ) {

            $district = GroupingByDistrict::getDistrict($itemGroupingDistrictLocation->district);

            if ( !empty($district) ) {

                if ( $district->total_of_subscribers != $itemGroupingDistrictLocation->total_of_subscribers ) {

                    $district->total_of_subscribers = $itemGroupingDistrictLocation->total_of_subscribers;
                    $district->save();
                }

                continue;
            }

            $geocoder = new Geocoder($client);
            $geocoder->setApiKey(config('geocoder.key'));
            $geocoder->setLanguage('tr');
            $coordinates = $geocoder->getCoordinatesForAddress($city . ',' . $itemGroupingDistrictLocation->district);

            GroupingByDistrict::create([
                'name'                  => $itemGroupingDistrictLocation->district,
                'city_id'               => $cityId,
                'total_of_subscribers'  => $itemGroupingDistrictLocation->total_of_subscribers,
                'latitude'              => $coordinates['lat'],
                'longitude'             => $coordinates['lng']
            ]);


        }
    }

    /**
     * @param $lat
     * @param $lng
     * @param $zoom
     * @param $groupingValue
     * @param $groupingType
     * @param $hasRoute
     */
    public static function mapping($lat, $lng, $zoom, $groupingValue, $groupingType, $hasRoute)
    {
        // açılacak haritada orta nokta belirliyoruz
        Mapper::map($lat, $lng, ['zoom' => $zoom, 'marker' => false, 'markers' => ['animation' => 'DROP']]);

        $routeName = '';
        // $html içinde route olacaksa bu değer true olarak gelir
        if ($hasRoute){

            if ($groupingType == 'country'){
                // $groupingType country ise o ülkenin şehirlerine göre gruplamak için route veriyoruz
                $routeName = 'grouping-by-city-location';
            }

            if ($groupingType == 'city'){
                // $gro$groupingType state ise o şehrin ilçelerine göre gruplamak için route veriyoruz
                $routeName = 'grouping-by-district-location';
            }
        }

        $count = 0;
        foreach ($groupingValue as $item){

            $markers = [
                'eventMouseOver' => 'infowindow_' . $count . '.open(map_0, marker_' . $count . ');',
                'eventMouseOut'  => 'infowindow_' . $count . '.close(map_0, marker_' . $count . ');'
            ];

            if ($hasRoute){
//dd($item);
                $redirectUrl = route($routeName, ['id' => $item->id]);
                $markers['eventClick'] = 'window.location.href = "' . $redirectUrl . '"';
            }

            //lokasyon noktası tıklandığında açılan kutucuğa yazdıracağımız metni oluşturuyoruz
            $html = "<div class='infowin' >
                        <h3>". $item->name . "</h3>
                        <small> Abone Sayısı: " . $item->total_of_subscribers . "</small>";

            // Her bir lokasyona karşılık gelen lat ve lng bilgilerindeki noktaları işaretliyoruz
            Mapper::informationWindow(
                $item->latitude,
                $item->longitude,
                $html,
                [
                    'title'   => $groupingType == 'district' ? $item->name : 'Detay için tıklayın',
                    'markers' => $markers,
                    'label'   => (string)$item->total_of_subscribers
                ]
            );

            $count++;
        }
    }
}
