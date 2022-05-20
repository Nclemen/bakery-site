<?php

namespace App;

use App/Models/Product;

class Cart
{
    public $items = [];

    __construct($cart){
        $this = $cart;
    }

    public function getCart(){
        return $this;
    }

    public function addToCart(Product $product,$amount){
        // if an item is already in the cart update the amount
        if($this->items[$product->name]){
            $this->update
        }

        $this->items[$product->name] = ['Amount' => $amount];
        return 'item added to cart';
    }

    public function removeFromCart(Product $product){
        unset($this->items[$product->name]);
        return;
    }

    public function updateItemAmount(Product $product, $amount){
        // add the new amount to the current amount for a specific item in the cart
        $this->items[$product->name]['Amount'] += $amount;
        return 'item amount updated';
    }

    /**
     * method to check specific item in card with amount
     *
     * returns product info inside cart
     *
     */
    public function checkItemInCart(Product $product){
        return $this->items[$product->name];
    }
}
