<?php
/**
 * User: boshurik
 * Date: 2019-08-13
 * Time: 18:14
 */

namespace App;

use App\Calculator\CalculatorInterface;
use App\Model\Cart;
use App\Model\Order;

class OrderFactory
{
    /**
     * @var CalculatorInterface
     */
    private $calculator;

    public function __construct(CalculatorInterface $calculator)
    {
        $this->calculator = $calculator;
    }

    public function create(Cart $cart): Order
    {
        return new Order($cart, $this->calculator->calculate($cart));
    }
}