<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Product;
use App\Customer;
use DB;
use App\Http\Requests\StoreSale;
use App\Http\Requests\UpdateSale;

class SaleController extends Controller
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
        return view('pages.sale.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('pages.sale.create',compact('customers','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSale $request)
    {
        $request->saveSale();
        return back()->with('flash', 'Sale has been added!');
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
        $sale = Sale::find($id);
        $customers = Customer::all();
        $products = Product::all();
        return view('pages.sale.edit',compact('sale','customers','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSale $request, $id)
    {
        $request->saveSale($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = Sale::find($id);
        $sale->delete();

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
    public function fetchSale()
    {
        return DB::table('sales')
            ->join('customers', 'sales.customer_id', '=', 'customers.id')
            ->join('products', 'sales.product_id', '=', 'products.id')
            ->select('sales.*', 'customer_name', 'product_name')
            ->whereNull('sales.deleted_at')
            ->paginate(5);
    }
}
