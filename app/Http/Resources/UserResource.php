<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class CountryResource
 * @package App\Http\Resources
 */
class UserResource extends JsonResource
{
    /** @var User */
    public $resource;

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'name' => $this->resource->name,
            'email' => $this->resource->email,
            'country' => CountryResource::collection($this->resource->userCountries),
            'phone' => PhoneResource::collection($this->resource->phone),
        ];
    }

}
