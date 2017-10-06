<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    /**
       * A category consists of subcategories.
       *
       * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function subCategories() {
    	return $this->hasMany(SubCategory::class);
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
    */
    protected $dates = ['deleted_at'];    
}
