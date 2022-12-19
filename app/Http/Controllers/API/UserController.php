<?php

namespace App\Http\Controllers\API;

use App\Dto\UserDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Interfaces\User\UserServiceInterface;
use App\Notifications\NewUserWithSms;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * @var UserServiceInterface $userService
     */
    private UserServiceInterface $userService;

    /**
     * @param UserServiceInterface $userService
     */
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param UserRequest $request
     */
    public function create(UserRequest $request)
    {

        $data = UserDto::transform($request->validated());
        $user = $this->userService->create($data);

        return new UserResource($user);
    }
}
