<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CrudController extends Controller
{
    public function addItem(Request $request)
    {

        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required',
            'product_image' => 'required|mimes:jpeg,jpg,png,gif|max:20000' //max values are in kb
        ]);

        $imagePath = $request->file('product_image')->store('images', 'public');

        Product::create([
            'product_name' => $request->input('product_name'),
            'product_price' => $request->input('product_price'),
            'product_image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Product added successfully');
    }

    public function addForm(){
        return view('add-form');
    }

    public function viewItem(){
        $products = Product::paginate(5);

        //dd($products);
        return view('dashboard', ['products' => $products]);
    }

    public function editForm($id){

        $product = Product::find($id);
        return view('edit-form', ['product' => $product]);
    }

    public function updateProduct(Request $request, $id){
        $product = Product::find($id);

        if(!$product){
            return redirect()->back()->with('error','Product not found!');
        }

        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required',
            'product_image' => 'nullable|mimes:jpeg,jpg,png,gif|max:20000' //max values are in kb
        ]);

        if($request->hasFile('product_image')){
            $imagePath = $request->file('product_image')->store('images', 'public');
            $product->product_image = $imagePath;
        }

        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->save();

        return redirect()->back()->with('success', 'Product updated successfully');

    }

    public function deleteProduct($id){
        $product = Product::find($id);

        if(!$product){
            return redirect()->back()->with('error','Product not found!');
        }
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
}
