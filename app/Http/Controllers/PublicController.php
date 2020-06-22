<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class PublicController extends Controller
{
  public function index(){
    $products=Product::paginate(3);
    return view('index',compact('products'));
  }
  public function singleProduct($id){
    $product=Product::find($id);
    return view('single',compact('product'));
  }
  public function add_cart(){
   $pdt=Product::find(request()->pdt_id);

  $cart= Cart::add([
    'id'=>$pdt->id,
    'price'=>$pdt->price,
    'name'=>$pdt->title,
    'qty'=>request()->qty
   ]);
   dd(Cart::content());

  }
}
