<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class VendorMachine
{
    public $snacks = [
        0 => [
            "name" => "Snickers",
            "price" => 1,
            "quantity" => 5
        ],
        1 => [
            "name" => "Mars",
            "price" => 1.5,
            "quantity" => 5
        ],
        2 => [
            "name" => "Twix",
            "price" => 2,
            "quantity" => 5
        ],
        3 => [
            "name" => "Bounty",
            "price" => 2.5,
            "quantity" => 5
        ]
    ];
    public $cashAmount = 0;
    public $isOn = false;

// Method to turn on:
    public function turnOn()
    {
        if ($this->isOn === false) {
            $this->isOn = true;
        } else {
            throw new Exception("Meme si vous voyez ce message, la machine n'est pas allumé, tkt fais confiance");
        }
    }

// Method to turn off:

    public function turnOff()
    {
        // Check if VendorMachine is On
        if ($this->isOn === true) {
            // get the current date and time
            $currentDateTime = new DateTime();
            // Keep only the current hour
            $currentHour = $currentDateTime->format('H');

            // check if Hour is = ou higher than 18h
            if ($currentHour >= 18) {
                // change isOn statement
                $this->isOn = false;
            }
        } else {
            throw new Exception("La machine est deja éteinte ou il n'est pas encore 18h");
        }
    }

    // Method to buy a snack
    public function buySnacks($snackName)
    {
        // Check if VendorMachine is On
        if ($this->isOn === true) {

            foreach ($this->snacks as $index => $snack) {
                // check if quantity and name exist
                if ($snack["name"] === $snackName && $snack["quantity"] >= 1) {
                    // substract quantity
                    $this->snacks[$index]["quantity"] -= 1;
                    // add snack's price in cashAmount
                    $this->cashAmount += $snack["price"];
                    break;
                }
            }
        }

    }

    // Method Shoot in like a potato
    public function shootWithFoot()
    {
        // Check if VendorMachine is on
        if ($this->isOn === true) {
            // get snack's stock
            $availableSnacks = array_filter($this->snacks, function ($snack) {
                // return only snack's quantity over 0
                return $snack["quantity"] > 0;
            });

            // if there are snacks
            if (count($availableSnacks) > 0) {
                // select randomly a snack
                $randomSnackKey = array_rand($availableSnacks);
                $randomSnack = $availableSnacks[$randomSnackKey];

                // reduce snack's quantity by randomsnack
                foreach ($this->snacks as $index => $snack) {
                    if ($snack["name"] === $randomSnack["name"]) {
                        $this->snacks[$index]["quantity"] -= 1;
                        break;
                    }
                }

                // generate a random var between 0 and cashAmount
                $randomMoney = mt_rand(0, $this->cashAmount);
                // reduce randomMoney to cashAmount
                $this->cashAmount -= $randomMoney;
            }
        }
    }
}

$vendorMachine1 = new VendorMachine();
$vendorMachine1->turnOn();
$vendorMachine1->buySnacks("Twix");
$vendorMachine1->buySnacks("Bounty");
$vendorMachine1->buySnacks("Bounty");
$vendorMachine1->buySnacks("Bounty");
$vendorMachine1->buySnacks("Bounty");
$vendorMachine1->shootWithFoot();
$vendorMachine1->shootWithFoot();
$vendorMachine1->shootWithFoot();

var_dump($vendorMachine1);





