<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class ProductController extends OsnovniController
{

    public function index(Request $request){

        $products = Product::with('categories');

        if($request->search){
            $products = $products->where('name', 'LIKE', '%'.$request->search.'%');
        }

        if($request->categories){
            $products = $products->whereHas('categories', function($query) use ($request){
                return $query->whereIn('category_id', $request->categories);
            });
        }

        if($request->sort){
            $products = $products->orderBy('price', $request->sort);
        }

        $this->data["products"] = $products->paginate(6);
        $this->data["categories"] = Category::all();
        return view('pages.products.index', $this->data);
    }

    public function show(Product $product){
        $this->data["product"] = $product;
        return view('pages.products.show', $this->data);
    }

    public function create(){
        $this->data["categories"] = Category::all();
        return view('pages.products.create', $this->data);
    }

    public function store(ProductStoreRequest $request){
        try {
            \DB::beginTransaction();
            $product = Product::create($request->only('name', 'description', 'price') + ["image" => "product1.jpg"]);
            $product->categories()->sync($request->categories);
            \DB::commit();
        } catch (Exception $e){
            \DB::rollBack();
            return redirect()->route('product.create');
        }
        
        return redirect()->route('products');
    }

    public function destroy(Product $product){
        try {
            \DB::beginTransaction();
            $product->categories()->detach();
            $product->delete();
            \DB::commit();
        } catch (Exception $e){
            \DB::rollBack();
            return redirect()->route('product', ["product" => $product->id]);
        }
        return redirect()->route('products');
    }

    public function edit(Product $product){
        $this->data["categories"] = Category::all();
        $this->data["product"] = $product;
        return view('pages.products.edit', $this->data);
    }

    public function update(ProductStoreRequest $request, Product $product){
        try {
            \DB::beginTransaction();
            $product->update($request->only('name', 'description', 'price'));
            $product->categories()->sync($request->categories);
            \DB::commit();
        } catch (Exception $e){
            \DB::rollBack();
            return redirect()->route('product.edit');
        }
        
        return redirect()->route('product', ["product" => $product->id]);
    }
}
