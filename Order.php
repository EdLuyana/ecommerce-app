<?php

class Order
{
// variable dans une class = propriété
    public $id;
    public $customerName;
    public $status = "cart";
    public $totalPrice;
    public $products = [];


    // method "__contruct()" is a magic method, created when call the class has a new one
    public function __construct($customerName){
        //customerName set as the propriety customerName
        $this->customerName = $customerName;
        // to set a unique ID
        $this->id = uniqid();

    }
    // function to add product, function in class is a method
    public function addProduct()
    {
        if ($this->status == "cart") {
            $this->products[] = "Pringles";
            $this->totalPrice += 3;
        }
    }

    //function to change order status from cart to paid
    public function pay()
    {
        if ($this->status == "cart") {
            $this->status = "paid";
        }
    }

    public function removeProduct(){
        // We check if the status allows to change the order
        if ($this->status == "cart") {
            // then, we check if Order is not empty
            if (!empty($this->products)) {
                // take away the last product pushed in the order
                $lastProduct = array_pop($this->products);

                // totalPrice reduces by the price set for the propriety
                $this->totalPrice -= 3;
            }
        }
    }
}

//example 1 : I create a new order, add 3 products and pay
$order1 = new Order("Edouard Duron");
$order1->addProduct();
$order1->addProduct();
$order1->addProduct();
$order1->removeProduct();
$order1->pay();

// example 2 I create a new order, add 1 product and pay
$order2 = new Order();
$order2->addProduct();
$order2->pay();

// var_dump to check results
var_dump($order1);
var_dump($order2);