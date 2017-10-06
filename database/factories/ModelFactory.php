<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => 'Jhon Doe',
        'email' => 'jon@mail.com',
        'password' => $password ?: $password = bcrypt('120120'),
        'remember_token' => str_random(10),
    ];
});

/**
Supplier seeder
*/
$factory->define(App\Supplier::class, function ($faker) {
	return [
		'supplier_name' => $faker->name,
		'supplier_email' => $faker->email,
		'supplier_phone' => $faker->phoneNumber,
		'supplier_company' => $faker->word,
		'supplier_address' => $faker->address,
		'supplier_description' => $faker->sentence(5),
	];
});

/**
Category seeder
*/
$factory->define(App\Category::class, function ($faker) {
	return [
		'category_name' => $faker->word,
		'category_details' => $faker->sentence(5),
		'edited_by' => '1'
	];
});

/**
SubCategory seeder
*/
$factory->define(App\SubCategory::class, function($faker) {
	return [
		'category_id' => function() {
			return factory('App\Category')->create()->id;
		},
		'subcategory_name' => $faker->word,
		'subcategory_details' => $faker->sentence(5),
		'edited_by' => '1'
	];
});

/**
Warehouse seed
*/
$factory->define(App\Warehouse::class, function ($faker) {

	return [
		'warehouse_name' => $faker->word,
		'warehouse_details' => $faker->sentence(5),
	];
});

/**
Employee seed
*/
$factory->define(App\Employee::class, function ($faker) {
	return [
		'employee_fname' => $faker->firstName,
		'employee_lname' => $faker->lastName,
		'employee_gender' => $faker->randomElement($array = array ('Male', 'Female')) ,
		'employee_email' => $faker->email,
		'employee_phone' => $faker->phoneNumber,
		'employee_birthday' => $faker->date,
		'employee_nid' => $faker->numberBetween(150000,1000000),
		'employee_address' => $faker->address,
		'employee_salary' => $faker->numberBetween(500,1000),
	];
});

/**
Customer seed
*/
$factory->define(App\Customer::class, function ($faker) {
	return [
		'customer_name' => $faker->name,
		'customer_email' => $faker->email,
		'customer_phone' => $faker->phoneNumber,
		'customer_address' => $faker->address,
		'customer_description' => $faker->sentence(5),
	];
});

/**
Income seed
*/
$factory->define(App\Income::class, function ($faker) {
	return [
		'income_amount' => $faker->numberBetween(1,1000),
		'income_paymentType' => $faker->word,
		'income_paymentFrom' => $faker->word,
		'income_paymentAccount' => $faker->word,
		'income_paymentDate' => $faker->date,
		'income_details' => $faker->sentence(10),
	];
});

/**
Expense seed
*/
$factory->define(App\Expense::class, function ($faker) {
	return [
		'expense_amount' => $faker->numberBetween(1,100),
		'expense_paymentType' => $faker->word,
		'expense_paymentTo' => $faker->word,
		'expense_paymentAccount' => $faker->word,
		'expense_paymentDate' => $faker->date,
		'expense_details' => $faker->sentence(10),
	];
});

/**
Product seed
*/
$factory->define(App\Product::class, function ($faker) {
	return [
		// 'category_id' => function() {
		// 	return factory('App\Category')->create()->id;
		// },
		// 'subcategory_id' => function() {
		// 	return factory('App\SubCategory')->create()->id;
		// },
		// 'supplier_id' => function() {
		// 	return factory('App\Supplier')->create()->id;
		// },
		// 'warehouse_id' => function() {
		// 	return factory('App\Warehouse')->create()->id;
		// },
		
		'product_name' => $faker->word,
		'product_code'=>$faker->word,
		'product_unit'=>$faker->numberBetween(1,10),
		'category_id' => $faker->numberBetween(1,3),
		'subcategory_id' => $faker->numberBetween(1,9),
		'supplier_id' => $faker->numberBetween(1,5),
		'warehouse_id' => $faker->numberBetween(1,3),
		'product_alertquantity' => $faker->numberBetween(1,100),
		'product_supplierPrice' => $faker->numberBetween(1,100),
		'product_sellPrice' => $faker->numberBetween(1,100),
		'product_tax' => $faker->numberBetween(1,10),
		'product_details' => $faker->sentence(10),
		'product_detailsforinvoice' => $faker->sentence(10),
		'product_image' => 'default.jpg',
		'edited_by' => '1'
	];
});

/**
Purchase seed
*/
$factory->define(App\Purchase::class, function ($faker) {
	return [
		'product_id' => $faker->numberBetween(1,10),
		'supplier_id' => $faker->numberBetween(1,3),
		'purchase_invoiceNo' => $faker->numberBetween(1,100),
		'purchase_status' => $faker->word,
		'purchase_date' => $faker->date,
		'purchase_cartoon' => $faker->numberBetween(1,100),
		'purchase_quantity' => $faker->numberBetween(1,100),
		'purchase_rate' => $faker->numberBetween(1,100),
		'purchase_total' => $faker->numberBetween(1,100),
		'edited_by' => '1'
	];
});

/**
Sale seed
*/
$factory->define(App\Sale::class, function ($faker) {
	return [
		'product_id' => $faker->numberBetween(1,10),
		'customer_id' => $faker->numberBetween(1,3),
		'sale_invoiceNo' => $faker->numberBetween(1,100),
		'sale_status' => $faker->word,
		'sale_date' => $faker->date,
		'sale_cartoon' => $faker->numberBetween(1,100),
		'sale_quantity' => $faker->numberBetween(1,100),
		'sale_rate' => $faker->numberBetween(1,100),
		'sale_total' => $faker->numberBetween(1,100),
		'edited_by' => '1'
	];
});