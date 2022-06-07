<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Http\Resources\CountryResource;

class CountryController extends BaseController
{
    public function index()
    {
        return $this->sendResponse(CountryResource::collection(Country::get()), 'Success info');
    }
}
