<?php

namespace App\Dto;

use Illuminate\Support\Arr;

class UserDto extends BaseDto
{
    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $email;


    /**
     * @var string
     */
    public string $password;


    /**
     * @var string
     */
    public string $phone;


    /**
     * @var int
     */
    public int $country_id;

    /**
     * @param array $data
     * @return UserDto
     */
    public static function transform(array $data): UserDto
    {
        $dto = new self();

        $dto->name = Arr::get($data,'name');
        $dto->email = Arr::get($data,'email');
        $dto->password = Arr::get($data,'password');
        $dto->phone = Arr::get($data,'phone',);
        $dto->country_id = Arr::get($data,'country_id');

        return $dto;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @return int
     */
    public function getCountry(): ?int
    {
        return $this->country_id;
    }
}
