<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function index()
    {

      
        return view('searchDemo');

    }

    public function autocomplete(Request $request)
    {
        // $data = Product::select("name")
        //             ->where('name', 'LIKE', '%'. $request->get('query'). '%')
        //             ->get();
        // $data['product'] = Product::where('category','cold')->orderBy('id','asc')->paginate(5);
        // $data['product'] = Product::where('name', 'LIKE', '%c%')->orderBy('id','asc')->paginate(5);
        // return view('/products/autocomplete',$data);

        
    }
}



