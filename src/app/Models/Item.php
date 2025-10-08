<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Purchase;
Use App\Models\Like;
use App\Models\category;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'category_id',
        'condition',
        'name',
        'brand',
        'explain',
        'price',
        'image',
    ];

    public function purchase() {
        return $this->hasOne(Purchase::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class, 'category_item');
    }
}
