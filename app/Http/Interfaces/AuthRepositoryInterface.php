<?php

namespace App\Http\Interfaces;

interface AuthRepositoryInterface
{
    public function sendVerificationCode($request);

    public function verifyCode($request);

    public function changePassword($request);
}