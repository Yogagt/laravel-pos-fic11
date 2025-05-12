<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        //get data product
        $products = DB::table('products')
        ->when($request->input('name'),function($query,$name){
            return $query->where('name','like','%'.$name.'%');
        })
        ->orderBy('created_at','desc')
        ->paginate(10);
        //sort by create_at desc

        return view('pages.product.index', compact('products'));
    }
    public function create()
    {
        return view('pages.product.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        \App\Models\Product::create($data);
        return redirect()->route('products.index')->with('success', 'Product successfully created');
    }
    public function edit($id)
    {
        $product = \App\Models\Product::findOrFail($id);
        return view('pages.product.edit', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $product = \App\Models\Product::findOrFail($id);
        $product->update($data);
        return redirect()->route('products.index')->with('success', 'Product successfully updated');
    }
    public function destroy($id)
    {
        $product = \App\Models\Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product successfully updated');
    }
}
