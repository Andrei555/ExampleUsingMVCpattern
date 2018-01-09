<?php

namespace Model\Form;

use Library\Request;

class LoginForm
{
    public $email;
    public $password;

    public function __construct(Request $request)
    {
        $this->password = $request->post('password');
        $this->email = $request->post('email');
    }

    function isValid()
    {
        $res = $this->password !== '' && $this->email !== '';
        return $res;
    }
}