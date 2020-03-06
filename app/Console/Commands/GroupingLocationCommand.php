<?php

namespace App\Console\Commands;

use App\GroupingByCity;
use App\GroupingByCountry;
use App\GroupingByDistrict;
use App\Helper\Helper;
use App\SubscriberLocation;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Spatie\Geocoder\Geocoder;

class GroupingLocationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:groupinglocationcommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lokasyon bilgileri alinan abonelerin lokasyonlarina göre ulke, sehir ve ilce bazinda gruplanarak kaydedilmesi';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {

            $subscriberLocation = new SubscriberLocation();
            $subscriberGroupingCountryLocation = $subscriberLocation->getGroupingCountries();

            $client = new Client();

            foreach ( $subscriberGroupingCountryLocation as $itemGroupingCountryLocation ) {

                $country = GroupingByCountry::getCountry($itemGroupingCountryLocation->country);

                if ( !empty($country) ) {

                    if ( $country->total_of_subscribers != $itemGroupingCountryLocation->total_of_subscribers ) {

                        $country->total_of_subscribers = $itemGroupingCountryLocation->total_of_subscribers;
                        $country->save();

                        Helper::groupingByCity($subscriberLocation, $itemGroupingCountryLocation->country, $country->id);

                    }

                    continue;
                }

                $geocoder = new Geocoder($client);
                $geocoder->setApiKey(config('geocoder.key'));
                $geocoder->setLanguage('tr');
                $coordinates = $geocoder->getCoordinatesForAddress($itemGroupingCountryLocation->country);

                $groupingByCountryCreate = GroupingByCountry::create([
                    'name'                 => $itemGroupingCountryLocation->country,
                    'total_of_subscribers' => $itemGroupingCountryLocation->total_of_subscribers,
                    'latitude'             => $coordinates['lat'],
                    'longitude'            => $coordinates['lng']
                ]);

                Helper::groupingByCity($subscriberLocation, $itemGroupingCountryLocation->country, $groupingByCountryCreate->id);
            }
        }
        catch (\Exception $ex) {

            throw $ex;
        }
    }
}
