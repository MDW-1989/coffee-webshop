<?php

namespace App\Http\Controllers;

use App\Models\Order_Item;
use App\Models\Order;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Order_ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['order_item'] = Order_Item::orderBy('id','asc')->paginate(5);	
		return view('order_items/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$orders = DB::table('orders')->get();
		$products = DB::table('products')->get();		
        return view('order_items/create', compact('orders', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$request->validate([
		'order_id' => 'required',
		'product_id' => 'required',
		'amount' => 'required',
		'total_price' => 'required',
		'sweetener' => 'required',
		'topping' => 'required',
		'flavour' => 'required',
		'milk' => 'required',
		'size' => 'required'
		]);
		
		$ord_item = new Order_Item;
		$ord_item->order_id = $request->order_id;
		$ord_item->product_id = $request->product_id;
		$ord_item->amount = $request->amount;
		$ord_item->total_price = $request->total_price;
		$ord_item->sweetener = $request->sweetener;
		$ord_item->topping = $request->topping;		
		$ord_item->flavour = $request->flavour;
		$ord_item->milk = $request->milk;
		$ord_item->size = $request->size;
		$ord_item->save();
		return redirect('order_items')
		->with('success','Product has been created successfully.');	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order_Item $ord_item)
    {
        return view('order_items/show',compact('ord_item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order_Item $ord_item)
    {
		$orders = DB::table('orders')->get();
		$products = DB::table('products')->get();
		return view('order_items/edit',compact('ord_item', 'orders', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$request->validate([
		'order_id' => 'required',
		'product_id' => 'required',
		'amount' => 'required',
		'total_price' => 'required',
		'sweetener' => 'required',
		'topping' => 'required',
		'flavour' => 'required',
		'milk' => 'required',
		'size' => 'required'
		]);

		$ord_item = Order_Item::find($id);
		$ord_item->order_id = $request->order_id;
		$ord_item->product_id = $request->order_id;
		$ord_item->amount = $request->amount;
		$ord_item->total_price = $request->total_price;
		$ord_item->sweetener = $request->sweetener;
		$ord_item->topping = $request->topping;		
		$ord_item->flavour = $request->flavour;
		$ord_item->milk = $request->milk;
		$ord_item->size = $request->size;
		$ord_item->save();
		return redirect('order_items')
		->with('success','Order Item Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order_Item $ord_item)
    {
		$ord_item->delete();
		return redirect('order_items')
		->with('success','Order Item has been deleted successfully');        
    }
}
