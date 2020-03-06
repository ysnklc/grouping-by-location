<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GroupingByCity
 * @package App
 *
 * @property int id
 * @property string name
 * @property int country_id
 * @property int total_of_subscribers
 * @property double latitude
 * @property double longitude
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class GroupingByCity extends Model
{
    protected $table = 'grouping_by_city';

    protected $fillable = ['name','country_id', 'total_of_subscribers', 'latitude', 'longitude'];

    /**
     * parametre olarak verilen il ismine ait bir kayıt var ise ilk kaydı döndürür
     * @param $cityName
     * @return self|null
     */
    public static function getCity($cityName)
    {
        return parent::query()
            ->where('name', $cityName)
            ->first();
    }

    public function districts()
    {
        return $this->hasMany(GroupingByDistrict::class, 'city_id', 'id');
    }
}
