<?php

namespace App\Http\Controllers;

use App\Models\ItemModel;
use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $itemCarts = [];
        $itemOrder = [];
        $countCart = 0;
        $countOrder = 0;
        $user = Auth::user();

        if ($user != null) {
            $itemCarts = User::find($user->id)->items()->get();
            $countCart = $itemCarts->count();

            $itemOrder = User::find($user->id)->order()->get();
            $countOrder = $itemOrder->count();
        }
        // return Response()->json($itemOrder);
        $items = ItemModel::orderByDesc('created')->paginate(10);
        return view('index', compact(['user', 'items', 'itemCarts', 'itemOrder', 'countCart', 'countOrder']));
    }
    public function sub_index($id_category, $sort,)
    {
        $items = [];
        $id_category = intval($id_category);
        if ($sort == 'Mới nhất') {
            $items = ItemModel::orderByDesc('created');
        } else if ($sort == 'Bán chạy') {
            $items = ItemModel::orderByDesc('sold');
        }
        if ($id_category != 0) {
            $items = $items->where('type', $id_category);
        }
        $items = $items->paginate(10);
        return view('index-index', compact('items'));
    }
    public function sub_index_search($search)
    {
        $items = [];
        $items = ItemModel::where('name', 'like', '%' . $search . '%')->paginate(10);
        return view('index-index', compact('items'));
    }
}
