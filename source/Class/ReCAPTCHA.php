<?php

namespace Source\Class;

class ReCAPTCHA
{

    private string $userToken;

    public function __construct(string $userToken)
    {
        $this->userToken = $userToken;
    }

    public function check(): string{
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$this->userToken}";
        return file_get_contents($url);
    }


}