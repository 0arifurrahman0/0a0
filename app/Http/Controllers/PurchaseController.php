<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use App\Product;
use App\Supplier;
use DB;
use App\Http\Requests\StorePurchase;
use App\Http\Requests\UpdatePurchase;
class PurchaseController extends Controller
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
        return view('pages.purchase.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('pages.purchase.create',compact('suppliers','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePurchase $request)
    {
        $request->savePurchase();

        return back()->with('flash', 'Purchase has been added!');
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
        $purchase = Purchase::find($id);
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('pages.purchase.edit',compact('purchase','suppliers','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePurchase $request, $id)
    {
         $request->savePurchase($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchase = Purchase::find($id);
        $purchase->delete();

        if (request()->expectsJson()) {
            return response(['status' => 'deleted.']);
        }

        return back();
    }

    /**
     * Return a listing of the resource suppliers.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchPurchase()
    {
        return DB::table('purchases')
            ->join('suppliers', 'purchases.supplier_id', '=', 'suppliers.id')
            ->join('products', 'purchases.product_id', '=', 'products.id')
            ->select('purchases.*', 'supplier_name', 'product_name')
            ->whereNull('purchases.deleted_at')
            ->paginate(5);
    }
}
