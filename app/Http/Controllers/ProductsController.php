<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::paginate(3);
        return view('products.index',['products'=>$products]);
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
     * @param  \App\Http\Requests\StoreProductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductsRequest $request)
    {
        $request->validate($request->rules(),$request->messages());
        $product = Products::create($request->all());
        return redirect()->route('products.index')->with('success',"Produto {$product->name} foi cadastrado com sucesso");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $product = Products::find($id);
        if(empty($product)) {
            return redirect()->route('products.index')->with('status','Este produto não existe');
        }
        return view('products.show',['product'=>$product]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $product = Products::find($id);
        if(empty($product)) {
            return redirect()->route('products.index')->with('status','Este produto não existe');
        }
        return view('products.edit',['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductsRequest  $request
     * @param  Int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductsRequest $request, int $id)
    {
        $product = Products::find($id);
        if(empty($product)) {
            return redirect()->route('products.index')->with('status','Este produto não existe');
        }
        $product->fill($request->all());
        $product->save();
        return redirect()->route('products.index')->with('success',"Produto {$product->name} atualizado com sucesso");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $product = Products::find($id);
        if(empty($product)) {
            return redirect()->route('products.index')->with('status','Este produto não existe');
        }
        $product->delete();
        return redirect()->route('products.index')->with('success','Deletado com sucesso');     
    }
}
