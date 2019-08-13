<?php
/**
 * User: boshurik
 * Date: 2019-08-13
 * Time: 18:16
 */

namespace App\Model;

use Money\Money;

class Product
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Money
     */
    private $cost;

    public function __construct(string $name, Money $cost)
    {
        $this->name = $name;
        $this->cost = $cost;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Money
     */
    public function getCost(): Money
    {
        return $this->cost;
    }
}