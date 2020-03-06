<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class SubscriberLocation
 * @package App
 *
 * @property int id
 * @property int subscriber_id
 * @property string country
 * @property string country_code
 * @property string city
 * @property string district
 * @property double latitude
 * @property double longitude
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class SubscriberLocation extends Model
{
    protected $table = 'subscriber_locations';

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getGroupingCountries()
    {
        return parent::query()
            ->select('country', DB::raw('count(*) as total_of_subscribers'))
            ->groupBy('country')
            ->get();
    }

    /**
     * @param $country
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getGroupingCity($country)
    {
        return parent::query()
            ->select('city', DB::raw('count(*) as total_of_subscribers'))
            ->where('country', $country)
            ->groupBy('city')
            ->get();
    }

    /**
     * @param $country
     * @param $city
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getGroupingDistrict($country, $city)
    {
        return parent::query()
            ->select('district', DB::raw('count(*) as total_of_subscribers'))
            ->where('country', $country)
            ->where('city', $city)
            ->groupBy('district')
            ->get();
    }
}
