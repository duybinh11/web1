<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\ItemModel;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showOrderDetail($id_cart)
    {
        $cart = CartModel::find($id_cart);
        $item = $cart->item()->first();
        // return Response()->json($cart);
        return view('order', compact(['cart', 'item']));
    }
}
