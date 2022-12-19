<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Interfaces\Auth\AuthServiceInterface;

class AuthController extends Controller
{
    /**
     * @var AuthServiceInterface $authService
     */
    private AuthServiceInterface $authService;

    /**
     * CityController constructor.
     * @param AuthServiceInterface $authService
     */
    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }


    public function register()
    {
        $countries = $this->authService->register();
dd($countries);
    }
}
