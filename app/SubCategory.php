<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
	use SoftDeletes;
    protected $guarded = [];

    /**
       * A subcategory is assigned a category.
       *
       * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function category() {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
    */
    protected $dates = ['deleted_at'];
}
