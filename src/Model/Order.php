<?php
/**
 * User: boshurik
 * Date: 2019-08-13
 * Time: 18:11
 */

namespace App\Model;

use Money\Money;

class Order
{
    /**
     * @var Cart
     */
    private $cart;

    /**
     * @var Money
     */
    private $price;

    public function __construct(Cart $cart, Money $price)
    {
        $this->cart = $cart;
        $this->price = $price;
    }

    /**
     * @return Cart
     */
    public function getCart(): Cart
    {
        return $this->cart;
    }

    /**
     * @return Money
     */
    public function getPrice(): Money
    {
        return $this->price;
    }
}