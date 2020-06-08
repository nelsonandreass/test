<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductRequest;
use App\NewArrivals;
use App\Product;
use App\Gallery;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        return view('admin.inputproduct');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $desc = $request->input('description');
        $price = $request->input('price');
        $status = $request->input('combobox');
        $discount = $request->input('discount');
        $photos = $request->file('file');
        //insert product
        $data = new Product();
        $data->name = $name;
        $data->desc = $desc;
        $data->price = $price;
        $data->status = $status;
        $data->discount = $discount;
        $data->save();

        //insert gallery
        if($photos == null){
            return redirect('/admin');
        }
        else{
            foreach($photos as $photo){
                $originalname = $photo->getClientOriginalName();
                $ext = $photo->getClientOriginalExtension();
                $filename = $originalname;
                $path = Storage::putFileAs('public',$photo,$filename);
    
                $image = new Gallery();
                $image->product_id = $data->id;
                $image->filepath = $path;
                $image->save();
            }
        }
        return redirect('/admin');
        //return response()->json(['success'=>'Product saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $products = Product::with(['galleries'])->get();
        return view('admin.editproduct' , ['products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->input('edit');
        $product = Product::with(['galleries'])->where('id',$id)->first();
        return view('admin.editproductform' , ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $desc = $request->input('description');
        $price = $request->input('price');
        $status = $request->input('combobox');
        $discount = $request->input('discount');
        $photos = $request->file('file');
        //update product
        Product::where('id',$id)->update([
            'name' => $name,
            'desc' => $desc,
            'price' => $price,
            'status' => $status,
            'discount' => $discount
        ]);
        
        return redirect('admin/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        $id = $request->input('id');
        Product::where('id',$id)->delete();
        Gallery::where('product_id',$id)->delete();
        return redirect('admin/edit');
    }
}
