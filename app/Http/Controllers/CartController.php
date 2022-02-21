<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket;
use App\Models\Cekout;
use App\Models\Cart as Carts;

class CartController extends Controller
{
    public function index()
    {
        $cartItem = \Cart::getContent();
        
        return view('front.cart', [
            'tikets' => $cartItem
        ]);
    }

    public function store()
    {
        $cartItem = \Cart::getContent();
// dd($cartItem);
        // $result = new Cekout;
        // $result['total'] = \Cart::getTotal();
        // $result['user_id'] = auth()->user()->id;
        // $detail = $result->save();
        
        $cekout = new Cekout;
        $cekout['total'] = \Cart::getTotal();
        $cekout['user_id'] = auth()->user()->id;
        $cekout->save();
        // $request['cekout_id'] = $cekout->id;


        foreach ($cartItem as $key) {
            $cart = new Carts;
            $cart['name'] = $key->name;
            $cart['cekout_id'] = $cekout->id;
            $cart['tiket_id'] = $key->id;
            $cart['quantity'] = $key->quantity;
            $cart['price'] = $key->price;
            $cart['image'] = $key->attributes->image;
            $cart->save();
        }
        
        return redirect()->route('index');
    }

    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
                )
            ]);
        
        // $cartItem = \Cart::getContent();
        // return view('front.cart')->with('success', 'Product is Added to Cart Successfully !')->with('tikets', $cartItem);
        
        return redirect()->back()->with('success', 'Product is Added to Cart Successfully !');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        return redirect()->back()->with('success', 'Item Cart is Updated Successfully !');
        // return view('front.cart')->with('success', 'Item Cart is Updated Successfully !');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->back()->with('success', 'Item Cart Remove Successfully !');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        return redirect()->back()->with('success', 'All Item Cart Clear Successfully !');
    }


}
