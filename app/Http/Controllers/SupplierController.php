<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSupplier;
use App\Http\Requests\UpdateSupplier;

class SupplierController extends Controller
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
        return view('pages.supplier.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.supplier.create');
    }

    /**
     * Store the incoming supplier.
     *
     * @param  StoreSupplier  $request
     * @return Response
     */
    public function store(StoreSupplier $request)
    {
        $request->saveSupplier();

        return back()->with('flash', 'Supplier has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('pages.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupplier $request, $id)
    {
        $request->saveSupplier($id);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

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
    public function fetchSupplier()
    {
        return Supplier::paginate(5);
    }
}
