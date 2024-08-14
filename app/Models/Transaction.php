<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Define the relationship with the Category model
    public function category()
    {
        return $this->belongsTo(Category::class, 'type'); // 'type' is the foreign key
    }
}
