<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\ItemModel;
use App\Models\OrderModel;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function showOrderDetail($id_cart)
    {

        $user = Auth::user();


        if ($user != null) {
            $itemCarts = User::find($user->id)->items()->get();
            $countCart = $itemCarts->count();

            $itemOrder = User::find($user->id)->order()->get();
            $countOrder = $itemOrder->count();
        }

        $items = ItemModel::orderByDesc('created')->paginate(10);
        $cart = CartModel::find($id_cart);
        $item = $cart->item()->first();
        return view('order', compact(['cart', 'user', 'item', 'itemCarts', 'countCart', 'itemOrder', 'countOrder']));
    }
    public function addOrderHandle(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $thoi_gian = date('y-m-d H:i:s', time());
        $user = Auth::user();
        $id_item = $request->id_item;
        $sl = $request->sl;
        $cost = $request->cost;
        $percent = $request->percent;
        OrderModel::insert(
            [
                'id_user' => $user->id,
                'id_item' => $id_item,
                'count' => $sl,
                'money' => $sl * $cost * (1 - $percent / 100),
                'state' => 'Chuẩn bị đơn hàng',
                'created' => $thoi_gian
            ]
        );
        return Redirect()->route('home');
    }
}
