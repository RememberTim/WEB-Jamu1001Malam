<?php

namespace App\Http\Controllers\API;

use Exception;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function all(Request $request){
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $product_id = $request->input('product_id');
        $status = $request->input('status');

        if($id){
            $transaction = Transaction::with(['product', 'user'])->find($id);
            if($transaction){
                return ResponseFormatter::success(
                    $transaction,
                    'Data Transaksi berhasil diambil'
                );
            }else{
                return ResponseFormatter::error(
                    null,
                    'Data Transaksi tidak ada',
                    404
                );
            }
        }

        $transaction = Transaction::with(['product', 'user'])->where('user_id', Auth::user()->id);
        if($product_id){
            $transaction->where('product_id', $product_id);
        }
        if($status){
            $transaction->where('status', $status);
        }

        return ResponseFormatter::success(
            $transaction->paginate($limit),
            'Data list Transaksi berhasil diambil'
        );

    }

    public function update(Request $request, $id){
        $transaction = Transaction::findOrFail($id);

        $transaction->update($request->all());

        return ResponseFormatter::success($transaction, 'Transaksi berhasil diperbarui');
    }

    public function checkout(Request $request){
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'quantity' => 'required',
            'total' => 'required',
            'total_keuntungan' => 'required',
            'status' => 'required',

         
        ]);

        $transaction = Transaction::create([
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'total_keuntungan' => $request->total_keuntungan,
            'status' => $request->status,
            'payment_url' =>'',
        ]);

    //    $product = Product::find($request->product_id);
    //      $product->stok -= $request->quantity;
    //      $product->save();

      
        
        //Konfigurasi Midtrans

        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        //Panggil transaksi yang sudah dibuat
        $transaction = Transaction::with(['product','user'])->find($transaction->id);

        //Membuat Transaksi Midtrans
        $midtrans = [
            'transaction_details' => array(
                'order_id' => $transaction->id,
                'gross_amount' => (int) $transaction->total,
            ),
            'customer_details' => array(
                'first_name' => $transaction->user->name,
                'email' => $transaction->user->email,
            ),
            'enabled_payments' =>array('gopay', 'bank_transfer'),
            'vtweb' => array()
        ];

        //Memanggil Midtrans

        try{
            // Ambil halaman payment midtrans
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
            $transaction->payment_url = $paymentUrl;
            $transaction->save();

            //Mengembalikan Data ke API
            return ResponseFormatter::success($transaction, 'Transaksi berhasil');
        
        }catch(Exception $e){
            return ResponseFormatter::error($e->getMessage(), 'Transaksi Gagal');
        }

        
    }
}
