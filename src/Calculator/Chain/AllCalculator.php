<?php
/**
 * User: boshurik
 * Date: 2019-08-13
 * Time: 18:21
 */

namespace App\Calculator\Chain;

use App\Calculator\CalculatorInterface;
use App\Model\Cart;
use Money\Money;

class AllCalculator implements CalculatorInterface
{
    /**
     * @var CalculatorInterface[]
     */
    private $calculators;

    public function __construct(CalculatorInterface ...$calculators)
    {
        $this->calculators = $calculators;
    }

    public function calculate(Cart $cart, ?Money $price = null): ?Money
    {
        foreach ($this->calculators as $calculator) {
            $price = $calculator->calculate($cart, $price);
        }

        return $price;
    }
}