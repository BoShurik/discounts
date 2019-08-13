<?php
/**
 * User: boshurik
 * Date: 2019-08-13
 * Time: 18:34
 */

namespace App\Calculator\Discount;

use App\Calculator\Discount\Discount;
use App\Model\Cart;
use Money\Money;

class ItemCountDiscount extends Discount
{
    /**
     * @var int
     */
    private $count;

    public function __construct($discount, int $count)
    {
        parent::__construct($discount);

        $this->count = $count;
    }

    public function calculate(Cart $cart, ?Money $price = null): ?Money
    {
        if (count($cart->getItems()) < $this->count) {
            return $price;
        }

        return parent::calculate($cart, $price);
    }
}