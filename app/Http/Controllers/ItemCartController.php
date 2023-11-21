<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartModel;

class ItemCartController extends Controller
{
    public function deleteCart($id_cart)
    {
        $cart = CartModel::find($id_cart);


        if ($cart) {
            $cart->delete();
        }
        return Redirect()->route('home');
    }
    public function addCartHandle(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $thoi_gian = date('y-m-d H:i:s', time());
        $user = Auth::user();
        $id_item = $request->id_item;
        $sl = $request->sl;
        CartModel::insert(
            [
                'id_user' => $user->id,
                'id_item' => $id_item,
                'sl' => $sl,
                'thoi_gian' => $thoi_gian
            ]
        );
        return Redirect()->route('home');
    }
}
