<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{

    use HasFactory;

    protected $table = 'item';

    public function users()
    {
        return $this->belongsToMany(User::class, 'cart', 'id_item', 'id_user');
    }
}
