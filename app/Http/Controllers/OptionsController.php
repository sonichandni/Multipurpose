<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Color;
use App\Models\Size;
use App\Models\Product;
use DB;

class OptionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getProdColor($id)
    {
        $products = Product::find($id)->options;
        return view('options.show')->with('products',$products);
    }
    public function getProdLth()
    {
        $products = Product::orderBy('price','asc')->get();
        return json_encode($products);
    }
    public function getProdHtl()
    {
        $products = Product::orderBy('price','desc')->get();
        return json_encode($products);
    }
    public function getProdR1()
    {
        $products = DB::table('products')
                    ->whereBetween('price', [0, 200])->get();
        return json_encode($products);
    }
    public function getProdR2()
    {
        $products = DB::table('products')
                    ->whereBetween('price', [201, 500])->get();
        return json_encode($products);
    }
    public function getProdR3()
    {
        $products = DB::table('products')
                    ->whereBetween('price', [501, 1000])->get();
        return json_encode($products);
    }
    public function getProdR4()
    {
        $products = DB::table('products')
                    ->where('price', '>=', 1001)
                    ->get();
        return json_encode($products);
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('options.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = Color::all();
        $sizes = Size::all();
        $products = Product::all();
        $data = [
            "colors" => $colors,
            "sizes" => $sizes,
            "products" => $products
        ];
        return view('options.create')->with($data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $option = new Option();
        $option->product_id = $request->input('prod');
        $option->color_id = $request->input('clr');
        $option->size_id = $request->input('psize');
        $option->save();
        echo "suc";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
