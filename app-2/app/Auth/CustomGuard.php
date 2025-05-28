<?php

namespace App\Auth;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Redis;
use Illuminate\Contracts\Auth\Authenticatable;

class CustomGuard implements Guard
{
    protected $provider;
    protected $user;

    public function __construct($provider)
    {
        $this->provider = $provider;
    }

    public function check()
    {
        //
    }

    public function user()
    {
        $cookieValue = request()->cookie('app_cross_session');

        $cacheValue = Redis::connection('default')->get(
            'app_cross_cache_' . $cookieValue,
        );

        dd($cacheValue);
    }

    public function guest()
    {
        return ! $this->check();
    }

    public function hasUser()
    {
        return ! is_null($this->user());
    }

    public function validate(array $credentials = [])
    {
        return true;
    }

    public function id()
    {
        return $this->user()->getAuthIdentifier();
    }

    public function setUser(Authenticatable $user)
    {
        $this->user = $user;
    }
}