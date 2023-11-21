<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\ItemModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ItemDetailController extends Controller
{
    public function showItemDetail($id_item)
    {
        $user = Auth::user();
        if ($user != null) {
            $itemCarts = User::find($user->id)->items()->get();
            $count = $itemCarts->count();
        }
        $item = ItemModel::find($id_item);
        return view('chitietdonhang', compact(['item', 'user', 'count', 'itemCarts']));
    }
}
