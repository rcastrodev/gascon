<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttributes extends Model
{
    protected $fillable = ['product_id','beginning','work_pressure','maximum_temperature','polished_stem','lower_connection','reference_height','approximate_weight','body_material', 'video1', 'video2', 'training'];
}
