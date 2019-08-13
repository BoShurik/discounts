<?php
/**
 * User: boshurik
 * Date: 2019-08-13
 * Time: 18:51
 */

namespace App\Calculator\Chain;

use App\Calculator\CalculatorInterface;
use App\Model\Cart;
use Money\Money;

class OneCalculator implements CalculatorInterface
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
            $newPrice = $calculator->calculate($cart, $price);
            if ($newPrice !== $price) {
                return $newPrice;
            }
        }

        return $price;
    }
}