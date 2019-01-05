<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'photo'=>'required',
            'price'=>'required',
            'description'=>'required',
        ]);

        $input = $request->all();

        if ($file = $request->file('photo')) {
            $name = time().$file->getClientOriginalName();
            $file->move('images', $name);
            $input['photo'] = $name;
        }

        Product::create($input);
        Session::flash('success', 'Product created successfully');

        return redirect('admin/products');
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
        $product = Product::find($id);
        return view('products.edit')->with('product', $product);
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
        $this->validate($request, [
            'name'=>'required',
            'photo'=>'required',
            'price'=>'required',
            'description'=>'required',
        ]);

        $product = Product::findOrFail($id);
        $input = $request->all();

        if ($file = $request->file('photo')) {
            $name = time().$file->getClientOriginalName();
            $file->move('images', $name);
            unlink(public_path().'/images/'.$product->photo);
            $input['photo'] = $name;
        }

        Product::where('id', $product->id)->first()->update($input);
        Session::flash('success', 'Product updated successfully');

        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        unlink(public_path().'/images/'.$product->photo);
        $product->delete();

        Session::flash('success', 'Product deleted successfully');

        return redirect()->back();
    }
}
