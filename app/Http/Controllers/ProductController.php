<?php
namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use Session;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
//
}
public function dashboard(){
    $products=Product::paginate(5);
    return view('admin.dashboard',compact('products'));
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
//
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
   $this->validate($request,[
       'title' => 'required|unique:products|max:255',
       'description' => 'required',
       'price'=>'required',
       'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
   ]);
   $product= new Product;
   $product->title=$request->title;
   $product->description=$request->description;
   $product->price=$request->price;
   $image=$request->file('image');
   $image_name=time().$image->getClientOriginalName();
   $image->move('productimage',$image_name);
   $product->image='productimage/'.$image_name;
   $product->save();
   Session::flash('success','Product added Successfull!!');
   return redirect()->back();


}
/**
* Display the specified resource.
*
* @param  \App\Product  $product
* @return \Illuminate\Http\Response
*/
public function show(Product $product)
{
//
}
/**
* Show the form for editing the specified resource.
*
* @param  \App\Product  $product
* @return \Illuminate\Http\Response
*/
public function edit(Product $product)
{
//
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  \App\Product  $product
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
    $this->validate($request,[
       'title' => 'required|unique:products|max:255',
       'description' => 'required',
       'price'=>'required',
       'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
   ]);
    $product=Product::find($id);
    $product->title=$request->title;
    $product->description=$request->description;
    $product->price=$request->price;
    if (file_exists($product->image)) {
        unlink($product->image);
    }
    $image=$request->file('image');
    $image_name=time().$image->getClientOriginalName();
    $image->move('productimage',$image_name);
    $product->image='productimage/'.$image_name;
    $product->update();
    Session::flash('success','Product Update Successfull!!');
    return redirect()->back();

//
}
/**
* Remove the specified resource from storage.
*
* @param  \App\Product  $product
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
    $product=Product::find($id);
    if (file_exists($product->image)) {
      unlink($product->image);
  }
  $product->delete();
  Session::flash('success','Product Delete Successfully!!');
  return redirect()->back();
}
}
