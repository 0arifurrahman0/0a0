<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function supplier() {
    	return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function category() {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function subCategory() {
    	return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }

    public function warehouse() {
    	return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
    */
    protected $dates = ['deleted_at'];    
}
