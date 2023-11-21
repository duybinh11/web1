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
        $count = 0;
        $user = Auth::user();

        if ($user != null) {
            $itemCarts = User::find($user->id)->items()->get();
            $count = $itemCarts->count();
        }

        // return Response()->json($itemCarts);
        $items = ItemModel::orderByDesc('created')->paginate(10);
        return view('index', compact(['user', 'items', 'itemCarts', 'count']));
    }
}
