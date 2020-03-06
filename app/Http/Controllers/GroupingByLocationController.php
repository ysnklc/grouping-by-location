<?php

namespace App\Http\Controllers;

use App\GroupingByCity;
use App\Helper\Helper;
use App\GroupingByCountry;
use Mapper;
use Illuminate\Http\Request;

class GroupingByLocationController extends Controller
{
    public function groipingByController()
    {
        $groupingByCountry = GroupingByCountry::all();

        Helper::mapping(30.0715461,15.5258733, 2.7, $groupingByCountry, 'country', true);

        return view('groupingbylocation');
    }

    public function groupingByCityLocation(Request $request)
    {
        $country = GroupingByCountry::find($request->countryId);
        $groupingByCity = $country->cities;

        Helper::mapping($country->latitude, $country->longitude, 6, $groupingByCity, 'city', true);

        return view('groupingbylocation');
    }

    public function groupingByDistrictLocation(Request $request)
    {
        $city = GroupingByCity::find($request->cityId);
        $groupingByDistrict = $city->districts;

        Helper::mapping($city->latitude, $city->longitude, 10, $groupingByDistrict, 'district', false);

        return view('groupingbylocation');
    }
}
