<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Pelanggan;
use App\Models\Categori;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index () {
        $users = User::all()->count();
        $pelanggans = Pelanggan::all()->count();
        $products = Product::all()->count();
        $categoris = Categori::all()->count();
        $transaksis = Transaksi::all()->count();
        return view('dashboard',compact('users', 'products','pelanggans','categoris','transaksis'));
    }
}
