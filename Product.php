<?php

class Product {
    private $id ;
    protected $price ;
    protected $title ;
    protected $shippingCost;

    public function buy(){
        echo "ici ça achete";
    }
    protected function ship(){
    echo "ici ça envoie";
    }

}

$Product = new Product();
$Product->buy();