<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Warehouse;
use App\Supplier;
use App\Category;
use App\SubCategory;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;

class ProductController extends Controller
{

    /**
    * Unauthenticate user can't access
    */
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
        return view('pages.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warehouses = Warehouse::all();
        $suppliers = Supplier::all();
        $categories = Category::all();

        return view('pages.products.create',compact('warehouses','suppliers','categories'));
    }

    /**
     * Show the subcategories under the selected category.
     *
     * @return \Illuminate\Http\Response
     */    
    public function ajax($id)
    {
        $subcategories = SubCategory::where("category_id",$id)->get();
                    
        return json_encode($subcategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $request->saveProduct();

        return back()->with('flash', 'Product has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('pages.products.show', compact('product'));
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
        $warehouses = Warehouse::all();
        $suppliers = Supplier::all();
        $categories = Category::all();
        $subCategories = SubCategory::all();
        return view('pages.products.edit', compact('product','warehouses','suppliers','categories','subCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct $request, $id)
    {
        $request->saveProduct($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        if (request()->expectsJson()) {
            return response(['status' => 'deleted.']);
        }

        return back();
    }

    public function fetchProduct()
    {
        return DB::table('products')
            ->join('suppliers', 'products.supplier_id', '=', 'suppliers.id')
            ->join('warehouses', 'products.warehouse_id', '=', 'warehouses.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('sub_categories', 'products.subcategory_id', '=', 'sub_categories.id')
            ->select('products.*', 'category_name', 'supplier_name', 'subcategory_name')
            ->whereNull('products.deleted_at')
            ->paginate(5);
    }
}
