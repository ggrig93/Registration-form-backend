<?php

namespace App\Services\Country;

use App\Interfaces\Country\CountryServiceInterface;
use App\Models\Country;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class CountryService
 * @package App\Services\Country
 */
class CountryService implements CountryServiceInterface
{
    /**
     * @return Collection|null
     */
    public function list(): ?Collection
    {
        return Country::get();
    }

}
