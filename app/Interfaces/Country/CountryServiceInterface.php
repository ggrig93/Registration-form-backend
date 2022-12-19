<?php

namespace App\Interfaces\Country;

use Illuminate\Database\Eloquent\Collection;

/**
 * Interface CountryServiceInterface
 * @package App\Interfaces\Country
 */
interface CountryServiceInterface
{
    /**
     * @return Collection|null
     */
    public function list(): ?Collection;

}
