<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GroupingByCountry
 * @package App
 *
 * @property int id
 * @property string name
 * @property int total_of_subscribers
 * @property double latitude
 * @property double longitude
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class GroupingByCountry extends Model
{
    protected $table = 'grouping_by_country';

    protected $fillable = ['name', 'total_of_subscribers', 'latitude', 'longitude'];

    /**
     * parametre olarak verilen ülke ismine ait bir kayıt var ise ilk kaydı döndürür
     * @param $countryName
     * @return self|null
     */
    public static function getCountry($countryName)
    {
        return parent::query()
            ->where('name', $countryName)
            ->first();
    }

    public function cities()
    {
        return $this->hasMany(GroupingByCity::class, 'country_id', 'id');
    }
}
