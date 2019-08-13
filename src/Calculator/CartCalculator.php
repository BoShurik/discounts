<?php
/**
 * User: boshurik
 * Date: 2019-08-13
 * Time: 18:23
 */

namespace App\Calculator;

use App\Model\Cart;
use Money\Money;

class CartCalculator implements CalculatorInterface
{
    public function calculate(Cart $cart, ?Money $price = null): ?Money
    {
        $price = $price ?? Money::EUR(0);
        foreach ($cart->getItems() as $item) {
            $price = $price->add($item->getCost());
        }

        return $price;
    }
}