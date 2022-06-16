<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['product'] = Product::orderBy('id','asc')->paginate(5);	
		return view('products/index', $data);
    }
    
	public function hot_index()
    {
		$data['product'] = Product::where('category','hot')->orderBy('id','asc')->paginate(5);
		return view('products/hot_products', $data);
    }
	
    public function cold_index()
    {
		$data['product'] = Product::where('category','cold')->orderBy('id','asc')->paginate(5);
		return view('products/cold_products', $data);
    }

    public function customize(Product $prod)
    {
		$products = DB::table('products')->get();
		return view('products/customize',compact('prod', 'products'));		
    }	

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$products = DB::table('products')->get();				
        return view('products/create', compact('products'));
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
		'name' => 'required',
		'description' => 'required',
		'image' => 'required',
		'price' => 'required',
		'category' => 'required',
		'stock' => 'required'
		]);
		
		$prod = new Product;
		$prod->name = $request->name;
		$prod->description = $request->description;
		$prod->image = $request->image;
		$prod->price = $request->price;		
		$prod->category = $request->category;
		$prod->stock = $request->stock;
		$prod->save();
		return redirect('products')
		->with('success','Product has been created successfully.');	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $prod)
    {
        return view('products/show',compact('prod'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $prod)
    {
		$products = DB::table('products')->get();
		return view('products/edit',compact('prod', 'products'));
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
		'name' => 'required',
		'description' => 'required',
		'image' => 'required',
		'price' => 'required',
		'category' => 'required',
		'stock' => 'required'
		]);
		
		$prod = Product::find($id);
		$prod->name = $request->name;
		$prod->description = $request->description;
		$prod->image = $request->image;
		$prod->price = $request->price;		
		$prod->category = $request->category;
		$prod->stock = $request->stock;		
		$prod->save();
		return redirect('products')
		->with('success','Person Has Been updated successfully');	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $prod)
    {
		$prod->delete();
		return redirect('products')
		->with('success','Product has been deleted successfully');        
    }


    public function productList()
    {
        $products = Product::all();

        return view('products', compact('products'));
    }
}
