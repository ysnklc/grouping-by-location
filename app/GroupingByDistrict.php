<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GroupingByDistrict
 * @package App
 *
 * @property int id
 * @property string name
 * @property int city_id
 * @property int total_of_subscribers
 * @property double latitude
 * @property double longitude
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class GroupingByDistrict extends Model
{
    protected $table = 'grouping_by_district';

    protected $fillable = ['name','city_id', 'total_of_subscribers', 'latitude', 'longitude'];

    /**
     * parametre olarak verilen il ismine ait bir kayıt var ise ilk kaydı döndürür
     * @param $districtName
     * @return self|null
     */
    public static function getDistrict($districtName)
    {
        return parent::query()
            ->where('name', $districtName)
            ->first();
    }
}
