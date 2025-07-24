<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index() {

        $this->addCountryStateCity();

    }


    public function addCountryStateCity() {
        // die;
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', "-1");
        $jsonData   =   file_get_contents("countries-states-cities.json");
        $countries  =   json_decode($jsonData, true);

        // $countries  =   $jsonArray['countries'];
        // $states     =   $jsonArray['states'];
        // $cities     =   $jsonArray['cities'];
        // dd($countries);
        foreach ($countries as $country) {
            $countryObject                  =   new Country();
            $countryObject->name            =   $country['name'];
            $countryObject->iso3            =   $country['iso3'];
            $countryObject->iso2            =   $country['iso2'];
            $countryObject->numeric_code    =   $country['numeric_code'];
            $countryObject->phone_code      =   $country['phonecode'];
            $countryObject->currency        =   $country['currency'];
            $countryObject->save();
            foreach ($country['states'] as $state) {
                $stateObject                =   new State();
                $stateObject->country_id    =   $countryObject->id;
                $stateObject->name          =   $state['name'];
                $stateObject->state_code    =   $state['state_code'];
                $stateObject->save();
                foreach ($state['cities'] as $city) {
                    $cityObject             =   new City();
                    $cityObject->state_id   =   $stateObject->id;
                    $cityObject->name       =   $city['name'];
                    $cityObject->save();
                }
            }
        }
        echo "done";
    }
}
