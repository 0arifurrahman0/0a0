<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        factory(App\User::class, 1)->create();
        factory(App\Supplier::class, 10)->create();
        $categories = factory(App\Category::class, 5)->create();
    	$categories->each(function ($category) {
            factory('App\SubCategory', 2)->create(['category_id' => $category->id]);
        });
        factory(App\Warehouse::class, 5)->create();
        factory(App\Employee::class, 10)->create();
        factory(App\Customer::class, 10)->create();
        factory(App\Income::class, 10)->create();
        factory(App\Expense::class, 10)->create();
        factory(App\Product::class, 20)->create();
        factory(App\Purchase::class, 5)->create();
        factory(App\Sale::class, 5)->create();
    }
}
