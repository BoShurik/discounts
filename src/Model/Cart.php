<?php
/**
 * User: boshurik
 * Date: 2019-08-13
 * Time: 18:15
 */

namespace App\Model;

class Cart
{
    /**
     * @var Product[]
     */
    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    /**
     * @return Product[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function addItem(Product $product): void
    {
        $this->items[spl_object_id($product)] = $product;
    }

    public function removeItem(Product $product): void
    {
        unset($this->items[spl_object_id($product)]);
    }

}