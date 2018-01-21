<?php

namespace Model\Form;

use Library\Request;

class ContactForm
{
    public $username;
    public $email;
    public $message;

    public function __construct(Request $request)
    {
        $this->username = $request->post('username');
        $this->email = $request->post('email');
        $this->message = $request->post('message');
    }

    function isValid()
    {
        $res = $this->username !== '' && $this->email !== '' && $this->message !== '';
        return $res;
    }

    function clean($value = "") {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        return $value;
    }
}