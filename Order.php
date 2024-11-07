<?php
class Order{

    public $id;
    public $customerName;
    public $status = "cart";
    public $totalPrice;
    public $products = [];


    // function to add product
    public function addProduct(){
        if ($this->status == "cart"){
            $this->products[] = "Pringles";
            $this->totalPrice += 3;
        }
    }

    //function to change order status from cart to paid
    public function pay(){
        if ($this->status == "cart"){
            $this->status = "paid";
        }
    }
}

//example 1 : I create a new order, add 3 products and pay
$order1 = new Order();
$order1->addProduct();
$order1->addProduct();
$order1->addProduct();
$order1->pay();

// example 2 I create a new order, add 1 product and pay
$order2 = new Order();
$order2->addProduct();
$order2->pay();

// var_dump to check results
var_dump($order1);
var_dump($order2);