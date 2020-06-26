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
        $cartItem= Cart::add([
            'id'=>$pdt->id,
            'price'=>$pdt->price,
            'name'=>$pdt->title,
            'qty'=>request()->qty
        ]);
        Cart::associate($cartItem->rowId, 'App\Product');
        return redirect()->route('cart');
    }
    public function cart(){
        return view('cart');
    }
    public function deletecart($id){
        Cart::remove($id);
        return redirect()->back();
    }
    public function cartdec($id,$qty){
        Cart::update($id,$qty-1);
        return redirect()->back();
    }
    public function cartinc($id,$qty){
        Cart::update($id,$qty+1);
        return redirect()->back();
    }
    public function addcart($id){
        $pdt=Product::find($id);
        $cartItem= Cart::add([
            'id'=>$pdt->id,
            'price'=>$pdt->price,
            'name'=>$pdt->title,
            'qty'=>1
        ]);
        Cart::associate($cartItem->rowId, 'App\Product');
        return redirect()->route('cart');
    }
    public function cartcheckout(){
        return view('checkout');
    }
    public function payment(){
        return view('payment');
    }
     public function paid(Request $request)
    {

         dd($request->all());
    }
}
