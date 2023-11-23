<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table = 'order';
    use HasFactory;
    public function item()
    {
        return $this->hasOne(ItemModel::class, 'id', 'id_item');
    }
}
