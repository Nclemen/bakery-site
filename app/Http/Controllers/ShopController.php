<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Models\Product;
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

//         dd($products);

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
//         $product = Product::find($id);
//         dd($product);

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

    public function cart (Request $request) {
        //    check if a card was retrieved from session if not create new cart instance
              if ($request->session()->pull('cart')) {
                $cart = $request->session()->pull('cart');
              } else {
                 $cart = Cart();
              }

        // return cart data to view

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