<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{

    public function __construct(){

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
        $products = Product::all();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[

            'name' => 'required|max:255',
            'image' => 'required|image',
            'description' => 'required',
            'price' => 'required',

        ]);

        $image = $request->image ;

        $image_new_name = time().$image->getClientOriginalName();

        $image->move('uploads/products',$image_new_name);

        $product = Product::create([

            'name'    => $request->name,
            'price'  => $request->price,
            'image' => 'uploads/products/'.$image_new_name,
            'description' => $request->description,
        ]);



        Session::flash('success','Post Created Successfully');

        return redirect()->route('products.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $productById = Product::find($id);



        return view('products.edit',compact('productById'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[

            'name' => 'required|max:255',

            'price' => 'required',
            'description' => 'required',

        ]);

        $product = Product::find($id);
        if($request->hasFile('image')){
            $productImage = $product->image;
            if(File::exists($productImage)){
               unlink($productImage);
            }

            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('uploads/products',$image_new_name);

            $product->image ='uploads/products/'.$image_new_name ;

        }

        $product->name = $request->name;
        $product->description = $request->description;
       $product->price = $request->price;

        $product->save();



        Session::flash('success','Product Is Updated');

        return redirect()->route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);



         $oldimage = explode("/",$product->image);
         $ollpppp = $oldimage[5];


        if(file_exists('uploads/products/'.$ollpppp))
        {
            unlink ('uploads/products/'.$ollpppp);
        }




        $product->delete();
        Session::flash('success','Product Is Deleted');

        return redirect()->route('products.index');
    }
}
