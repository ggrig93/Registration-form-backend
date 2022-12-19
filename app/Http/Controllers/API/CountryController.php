<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Interfaces\Country\CountryServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CountryController extends Controller
{
    /**
     * @var CountryServiceInterface $countryService
     */
    private CountryServiceInterface $countryService;

    /**
     * CityController constructor.
     * @param CountryServiceInterface $countryService
     */
    public function __construct(CountryServiceInterface $countryService)
    {
        $this->countryService = $countryService;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function list(): AnonymousResourceCollection
    {
        $countries = $this->countryService->list();

        return CountryResource::collection($countries);
    }

}
