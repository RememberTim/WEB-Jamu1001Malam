<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function all(Request $request){
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $nama = $request->input('nama');
        $tipe = $request->input('tipe');

        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        $rate_from = $request->input('rate_from');
        $rate_to = $request->input('rate_to');

        if($id){
            $product = Product::find($id);
            if($product){
                return ResponseFormatter::success(
                    $product,
                    'Data produk berhasil diambil'
                );
            }else{
                return ResponseFormatter::error(
                    null,
                    'Data produk tidak ada',
                    404
                );
            }
        }

        $product = Product::query();
        if($nama){
            $product->where('nma$nama', 'like','%' . $nama . '%');
        }

        if($tipe){
            $product->where('tipe', 'like','%' . $tipe . '%');
        }

        if($price_from){
            $product->where('price', '>=', $price_from);
        }

        if($price_to){
            $product->where('price', '<=', $price_to);
        }

        if($rate_from){
            $product->where('rate', '>=', $rate_from);
        }

        if($rate_to){
            $product->where('rate', '<=', $rate_to);
        }

        return ResponseFormatter::success(
            $product->paginate($limit),
            'Data list produk berhasil diambil'
        );

    }
}
