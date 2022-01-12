<?php

class User
{
    public $id;
    public $username;
    public $password;
    public $role;
    public $subscribtion;
    public $firstname;
    public $lastname;
    public $phonenumber;
    public $gender;
    public $email;

    public function __construct()
    {
        settype($this->id, 'integer');
        settype($this->subscribtion, 'integer');
        settype($this->phonenumber, 'integer');
    }
}