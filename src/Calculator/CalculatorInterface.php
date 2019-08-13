<?php
/**
 * User: boshurik
 * Date: 2019-08-13
 * Time: 18:20
 */

namespace App\Calculator;

use App\Model\Cart;
use Money\Money;

interface CalculatorInterface
{
    public function calculate(Cart $cart, ?Money $price = null): ?Money;
}