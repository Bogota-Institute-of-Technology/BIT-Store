<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index', [
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(Auth::user()->id);
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string'],
            'value' => ['required', 'integer'],
        ]);
        
        Product::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'value' => $request->get('value'),
            'status' => $request->get('status'),
            'idUser' => $request->get('idUser'),
            'image' => $this->saveImage($request->file('bookcover')),
        ]);
        return redirect('/products');
    }

    public function saveImage($cover){
        $image = '';
        if ($cover != null) {
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('public')->put($cover->getFilename() . '.' . $extension,  File::get($cover));
            $image = $cover->getFilename() . '.' . $extension;
        }
        return $image;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('product.show', [
            'product' => Product::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('product.edit', [
            'product' => Product::findOrFail($id)
        ]);
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
        //dd($request->get('precious_image'));
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string'],
            'value' => ['required', 'integer'],
        ]);

        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->value = $request->get('value');
        $product->status = $request->get('status');
        $product->idUser = $request->get('idUser');

        if ($request->file('bookcover')){
            Storage::disk('public')->delete($request->get('precious_image'));
            $product->image = $this->saveImage($request->file('bookcover'));
        }
        
        $product->save();
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
    }

    public function all_products(){
        return view('product.all_products', [
            'products' => Product::all()
        ]);
    }
}
