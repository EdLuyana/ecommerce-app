<?php

class Order
{
// variable dans une class = propriété
    public $id;
    public $customerName;
    public $status = "cart";
    public $totalPrice;
    public $products = [];
    public $shippingAddress;


    // method "__contruct()" is a magic method, created when call the class has a new one
    public function __construct($customerName)
    {
        //customerName set as the propriety customerName
        $this->customerName = $customerName;
        // to set a unique ID
        $this->id = uniqid();
        // to set adress
    }
    //method to change statut from paid to sent

    // function to add product, function in class is a method
    public function addProduct()
    {
        if ($this->status == "cart") {
            $this->products[] = "Pringles";
            $this->totalPrice += 3;
        } else {
            throw new Exception("Veuillez ajouter un produit à votre panier");
        }
    }

    public function removeProduct()
    {
        // We check if the status allows to change the order
        if ($this->status == "cart") {
            // then, we check if Order is not empty
            if (!empty($this->products)) {
                // take away the last product pushed in the order
                array_pop($this->products);
                // totalPrice reduces by the price set for the propriety
                $this->totalPrice -= 3;
            }
        }
    }

    public function setShippingAdress($shippingAddress)
    {
        if ($this->status == "cart") {
            $this->shippingAddress = $shippingAddress;
            $this->status = "shippingAddressSet";
        } else {
            throw new Exception("Veuillez ajouter un produit à votre panier");
        }
    }

    //function to change order status from cart to paid
    public function pay()
    {
        if ($this->status == "shippingAddressSet" && !empty($this->products)) {
            $this->status = "paid";
        } else {
            throw new Exception("Vous ne pouvez pas payer, merci de remplir votre adresse avant");
        }
    }

    public function ship()
    {
        //here we check if the statut is already paid and the adress exists
        if ($this->status == "paid") {
            $this->status = "shipped";
        } else {
            throw new Exception("Veuillez payer votre commande pour commencer la livraison");
        }
    }


}

//example 1 : I create a new order, add 3 products and pay
$order1 = new Order("Edouard Duron");
$order1->addProduct();
$order1->addProduct();
$order1->removeProduct();
$order1->setShippingAdress("10 allée Louis antoine de Bougainville 33260 La Teste de Buch");
$order1->pay();
$order1->ship();


// var_dump to check results
var_dump($order1);
