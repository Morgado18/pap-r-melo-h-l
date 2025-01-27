<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductStatus extends Model
{
    use HasFactory;

    use SoftDeletes;

    public $table = 'product_status';

    protected $guarded = [];
}
