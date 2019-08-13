<?php
/**
 * User: boshurik
 * Date: 2019-08-13
 * Time: 18:53
 */

namespace App\Calculator\Discount;

use App\Calculator\CalculatorInterface;
use App\Model\Cart;
use Money\Money;

class Discount implements CalculatorInterface
{
    /**
     * @var Money|string
     */
    private $discount;

    public function __construct($discount)
    {
        $this->discount = $discount;
    }

    public function calculate(Cart $cart, ?Money $price = null): ?Money
    {
        if ($price === null) {
            throw new \LogicException('Cant apply discount to empty price');
        }

        if ($this->discount instanceof Money) {
            return $price->subtract($this->discount);
        }

        list($discounted, $rest) = $price->allocate([100 - $this->discount, $this->discount]);

        return $discounted;
    }
}