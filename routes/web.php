<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::get('/', 'PagesController@index');

Route::get('/home', 'HomeController@index')->name('home');

/**
Supplier
*/
Route::get('fetchSupplier', 'SupplierController@fetchSupplier');
Route::resource('supplier', 'SupplierController');

/**
Category
*/
Route::get('fetchCategory', 'CategoryController@fetchCategory');
Route::resource('category', 'CategoryController');

/**
SubCategory
*/
Route::get('fetchSubcategory', 'SubCategoryController@fetchSubcategory');
Route::resource('subcategory', 'SubCategoryController');

/**
Employee
*/
Route::get('fetchEmployee', 'EmployeeController@fetchEmployee');
Route::resource('employee', 'EmployeeController');

/**
WareHouse
*/
Route::get('fetchWarehouse', 'WarehouseController@fetchWarehouse');
Route::resource('warehouse', 'WarehouseController');

/**
Customer
*/
Route::get('fetchCustomer', 'CustomerController@fetchCustomer');
Route::resource('customer', 'CustomerController');

/**
Income
*/
Route::get('fetchIncome', 'IncomeController@fetchIncome');
Route::resource('income', 'IncomeController');

/**
Expense
*/
Route::get('fetchExpense', 'ExpenseController@fetchExpense');
Route::resource('expense', 'ExpenseController');

/**
Product
*/
Route::get('fetchProduct', 'ProductController@fetchProduct');
Route::resource('product', 'ProductController');
Route::get('product/create/ajax/{id}',array('as'=>'product.create.ajax','uses'=>'ProductController@ajax'));

/**
Purchase
*/
Route::get('fetchPurchase', 'PurchaseController@fetchPurchase');
Route::resource('purchase', 'PurchaseController');


/**
Sale
*/
Route::get('fetchSale', 'SaleController@fetchSale');
Route::resource('sale', 'SaleController');