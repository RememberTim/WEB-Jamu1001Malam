<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $income = Transaction::where('status', 'SELESAI')->sum('total');
        $income1 = Transaction::where('status', 'SELESAI')->sum('total_keuntungan');

        $sales = Transaction::where('status', 'SELESAI')->count();
        $sales1 = Transaction::where('status', 'MASUK')->count();
        $items = Transaction::orderBy('id', 'desc')->take(5)->get();

       
        return view('dashboard')->with([
            'income' => $income,
            'income1' => $income1,
            'sales' => $sales,
            'sales1' => $sales1,
            'items' => $items,
               
        ]);
    }
}
