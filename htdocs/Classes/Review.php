<?php
class Review
{
    public $id;
    public $rating;
    public $title;
    public $description;
    public $customer_id;
    public $product_id;

    public function __construct()
    {
        settype($this->id, 'integer');
        settype($this->rating, 'integer');
        settype($this->customer_id, 'integer');
        settype($this->product_id, 'integer');
    }
}
?>