<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cekout;
use App\Models\Cart;;

class FCekoutController extends Controller
{
    public function index() {
        return view('front/cekouts', [
            'cekouts' => Cekout::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function detail($id) {
        return view('front/detailCekout', [
            'cekout' => Cart::where('cekout_id', $id)->get()
        ]);
    }
}
