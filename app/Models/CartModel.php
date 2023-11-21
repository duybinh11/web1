<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    use HasFactory;
    protected $table = 'cart';

    public function item()
    {
        return $this->hasOne(ItemModel::class, 'id', 'id_item');
    }
}
