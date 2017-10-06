<?php

namespace App;
use App\Product;
use App\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
    */
    protected $dates = ['deleted_at'];
}
