<?php

namespace App\Http\Controllers;

use App\Models\Order_Item;
use App\Models\Order;
use App\Models\Product;

use Illuminate\Http\Request;

class CartController extends Controller
{	

    public function cartList()
    {
        $cartItems = \Cart::getContent();
         //dd($cartItems);
		 
        return view('cart', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
		$quantity = $request->quantity - 1;
		$cartItems = \Cart::getContent();
		//$id = count($cartItems) + 1;
		//return $this->countItemsCart();
		$id = $this->countItemsCart();
		
        \Cart::add([
            'id' => $id,
			'product_id' => $request->product_id,
            'name' => $request->name,
			'description' => $request->description,	
			'sweetener' => $request->sweetener,
			'topping' => $request->topping,
			'flavour' => $request->flavour,
			'milk' => $request->milk,
			'size' => $request->size,
            'price' => $request->price,
            'quantity' => $quantity,
			'discount' => 0,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
		
        session()->flash('success', 'Product is Added to Cart Successfully !');
        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
		if($request->quantity < 1)
		{
			session()->flash('failure', 'An item cannot be lower than one!');
		}
		else
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
			
			session()->flash('success', 'Item Cart is Updated Successfully !');
		}
		return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        
		session()->flash('success', 'Item Cart Remove Successfully !');
        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'Cart Cleared Successfully !');
        return redirect()->route('cart.list');
    }
	
    public function countItemsCart()
    {
		$cartItems = \Cart::getContent();
		$counter = 0;

		foreach ($cartItems as $cart)
		{
			if($counter < $cart->id)
			{
				$counter = $cart->id + 1;
			}
			else
			{
				$counter = $cart->id + 1;
			}
		}   

		return $counter;
    }	
	
    public function store_order_item(Request $request)
    {
		$cart_checkout_items = session()->get('4yTlTDKu3oJOfzD_cart_items');
		$run_already = false;
		
		foreach ($cart_checkout_items as $cart)
		{
			$cart->total_price = $cart->quantity * $cart->price;
			
			$ord_item = new Order_Item;
			$ord_item->product_id = $cart->product_id;
			$ord_item->amount = $cart->quantity;
			$ord_item->total_price = $cart->total_price;
			$ord_item->sweetener = $cart->sweetener;
			$ord_item->topping = $cart->topping;		
			$ord_item->flavour = $cart->flavour;
			$ord_item->milk = $cart->milk;
			$ord_item->size = $cart->size;
			$ord_item->save();
			
			if($run_already == false)
			{
				$ord = new Order;
				$ord->user_id = $request->session()->get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
				$ord->save();
				
				//return ($ord->id);
				
				$run_already = true;
			}
			//return ($ord->id);

			$ord_item->order_id = $ord->id;
			$ord_item->save();				
			
			//print_r ($cart_checkout_items[$cart->id]);
		}
		
		return redirect('cart');
    }	
	
    public function getDiscount(Request $request)
    {
		$discount_code = $request->discount_code;
		\Cart::setDiscount($discount_code);
		$data['discount'] = \Cart::getTotalDiscount();
		
        $cartItems = \Cart::getContent();	

		//return $cartItems = \Cart::getContent();
		
		return view('cart', $data, compact('cartItems'));
    }	
}
