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
        $item = ItemModel::find($id_item);
        if ($user != null) {
            $itemCarts = User::find($user->id)->items()->get();
            $countCart = $itemCarts->count();
            $itemOrder = User::find($user->id)->order()->get();
            $countOrder = $itemOrder->count();
        } else {
            return view('chitietdonhang', compact(['item', 'user']));
        }

        return view('chitietdonhang', compact(['item', 'user', 'countCart', 'itemCarts', 'itemOrder', 'countOrder']));
    }
}
