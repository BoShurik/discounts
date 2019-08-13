<?php
/**
 * User: boshurik
 * Date: 2019-08-13
 * Time: 18:42
 */

require_once __DIR__ . '/../vendor/autoload.php';

use App\Calculator\CartCalculator;
use App\Calculator\Chain\AllCalculator;
use App\Calculator\Chain\OneCalculator;
use App\Calculator\Discount\Discount;
use App\Calculator\Discount\ItemCountDiscount;
use App\Model\Cart;
use App\Model\Product;
use App\OrderFactory;
use Money\Money;

$cart = new Cart();
$cart->addItem(new Product('Product1', Money::EUR(10000)));
$cart->addItem(new Product('Product2', Money::EUR(10000)));
$cart->addItem(new Product('Product3', Money::EUR(10000)));
$cart->addItem(new Product('Product4', Money::EUR(10000)));
$cart->addItem(new Product('Product5', Money::EUR(10000)));

$factory = new OrderFactory(new AllCalculator(
    new CartCalculator(),
    new AllCalculator(
        new Discount(Money::EUR(100))
    ),
    new OneCalculator(
        new ItemCountDiscount(Money::EUR(10000), 5),
        new ItemCountDiscount(10, 3)
    )
));

$order = $factory->create($cart);

var_dump($order);