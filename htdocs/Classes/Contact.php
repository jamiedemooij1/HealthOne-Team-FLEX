<?php


class Contact
{
    public $id;
    public $name;
    public $adres;
    public $postcode;
    public $place;
    public $phone;
    public $groundplace;

    public function __construct()
    {
        settype($this->id, 'integer');
    }
}