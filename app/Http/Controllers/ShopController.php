<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Models\Product;
use App\Classes\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ShopController extends Controller
{

    /**
     *  the front page of the store showing all the products the store sells
     *
     *
     *
     * @return \Inertia\Response
     */
    public function index () {

        $products = Product::all();

        return Inertia::render('Shop', [
            'products' => $products,
        ]);
    }

    /**
     * method for the product page showing the product details
     *
     *
     *
     */
    public function productPage (Product $product) {

        // return product data to view
                return Inertia::render('Product',['product' => $product]);
    }

    public function specialOrder () {
        // page to place special orders aka orders not available in the store or beyond the max amount one can order at once
    }

    public function addToCart (Request $request) {
        //
        $product = Product::find($request->id);
        //
        $amount = $request->amount;
        //    get cart from session
        $cart = $request->session()->pull('cart');
        // check if the cart retrieved from session was success if not create new cart instance

        dd($request);

        if (!$cart) {
            $cart = Cart();
        }


        // add product to cart
        $cart::addProduct($request->input('name'),$amount);
        // save cart to session
        $request->session()->put('cart', $cart);
        //
        return Inertia::render('OrderHasBeenPlaced');
        //
    }


    /**
     * method to show the cart
     * 
     * 
     */
    public function cart (Request $request) {
        //    check if a card was retrieved from session if not create new cart instance
              if ($request->session()->pull('cart')) {
                $cart = $request->session()->pull('cart');
              } else {
                 $cart = new Cart();
                 $cart->addToCart(Product::find(rand(1, 20)),rand(1, 8));
                 $cart->addToCart(Product::find(rand(1, 20)),rand(1, 8));
              }

        // return cart data to view

//         dd($cart);
//
        return Inertia::render('Cart',[
            'cart' => $cart,
        ]);
    }

    public function placeOrder (Request $request) {
        // place order by creating order object and sending it to order table in database
        //
        // retrieve cart from session
        // $cart = $request->session()->pull('cart');
        //
        // $order = Order();
        //
        // $order::create($cart);
        //
        // send email with invoice pdf
        //
        //
        // create invoice
        //
        // $invoice = Invoice::make('receipt')->template('bakery');
        //
        // create email and add invoice as attachment
        //
        // Mail::to($request->user())->send(new OrderPlaced($order));
        //
    }

}
