<?php

class User
{
    public $id;
    public $username;
    public $role;
    public $password;
    public $subscribtion;
    public $firstname;
    public $lastname;
    public $phonenumber;
    public $gender;
    public $mailaddress;

    public function __construct()
    {
        settype($this->id, 'integer');
        settype($this->subscribtion, 'integer');
        settype($this->phonenumber, 'integer');
    }
}