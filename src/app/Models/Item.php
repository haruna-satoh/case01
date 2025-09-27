<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Purchase;
Use App\Models\Like;

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
    ];

    public function purchase() {
        return $this->hasOne(Purchase::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }
}
