<?php

namespace App\Services\User;

use App\Interfaces\User\UserServiceInterface;
use App\Models\User;
use App\Notifications\UserRegistrationNotification;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

/**
 * Class CountryService
 * @package App\Services\Country
 */
class UserService implements UserServiceInterface
{

    public function create($data)
    {
        $user = User::query()->create([
            'name' => $data->getName(),
            'email' => $data->getEmail(),
            'password' => Hash::make($data->getPassword()),
        ]);


        $user->phone()->create(['phone' => $data->getPhone()]);
        $user->userCountries()->attach($data->getCountry());

        Notification::send($user, new UserRegistrationNotification($data->getPhone()));

        return $user;
    }

}
