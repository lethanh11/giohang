<?php

namespace App\Http\Controllers;

use App\Product;
use Dotenv\Result\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index(){
        $products= Product::get();
        return view('index',compact('products'));
    }

    public function addTocart($id){

        // Session::flush('cart');
        $product = Product::findOrFail($id);
        $cart =Session::get('cart');
        if(isset($cart[$id])){
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;

        } else {
            $cart[$id] = [
                'id'=>$product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image_path,

            ];

        }
        Session::put('cart',$cart);
        // dump(Session::get('cart'));
        return response()->json([
           'code' =>200,
           'message' => 'success',
        ],  200 );
        // Kiểm tra mảng
        // echo "<pre>";
        // print_r (Session::get('cart'));

    }

    public function showCart(){
        $carts = Session::get('cart');
        return view('cart',compact('carts'));
    }

    public function updateCart(Request $request){
        if($request->id && $request->quatity) {
            $carts = Session::get('cart');
            $carts[$request->id]['quantity'] =  $request->quatity;
            Session::put('cart', $carts);
            $carts = Session::get('cart');
            $Compoments = view('compoments',compact('carts'))->render();
            return response()->json(['compoments' => $Compoments, 'code'=> 200], 200);
        }
     }

     public function deleteCart(Request $request){
        if($request->id) {
            $carts = Session::get('cart');
            unset($carts[$request->id]);
            Session::put('cart', $carts);
            $carts = Session::get('cart');
            $Compoments = view('compoments',compact('carts'))->render();
            return response()->json(['compoments' => $Compoments, 'code'=> 200], 200);
        }
     }
}
