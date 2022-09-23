<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllProduk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['category'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
