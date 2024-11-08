<?php

class Product {
    protected $id ;
    protected $price ;
    protected $title ;
    private $shippingCost;

    public function buy(){
        echo "ici ça achete";
    }
    protected function ship(){
    echo "ici ça envoie";
    }

}

$Product = new Product();
$Product->buy();