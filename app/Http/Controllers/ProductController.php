<?php

namespace App\Http\Controllers;

use App\Product;
use App\UnitPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as Validator;
// use Illuminate\Validation\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('unitprices')->get();

        return view('products',compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::with('unitprices')->get();
        // dd($products);
        return view('admin.products', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'product' => 'required|string|min:4|max:255',
            'description' => 'required|string',
            'unitprice' => 'required|integer|min:1',
            'image' => 'required|file|mimes:jpeg,png,jpg'
        ])->validate();

        $file = $request->file('image');

        $folder = 'img/product';

        $file_foto = time() . "_" . $file->getClientOriginalName();

        $file->move($folder, $file_foto);

        Product::create([
            'name_product' => $request->product,
            'description' => $request->description,
            'image' => $file_foto
        ]);

        $product = Product::where('image', '=', $file_foto)->first();

        UnitPrice::create([
            'id_product' => $product->id,
            'unit_price' => $request->unitprice
        ]);

        return redirect()->back()->with('created', $request->product);
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
