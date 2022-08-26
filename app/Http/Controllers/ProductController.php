<?php

namespace App\Http\Controllers;

use App\Events\ProductCreated as ProductCreatedEvent;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{


    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $products = Product::all();
        $messageSuccess = $request->session()->get('message.success');
        return view('products.index')->with('products',$products)->with('messageSuccess',$messageSuccess);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        return view('products.create')->with('product',$product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        if($image = $request->file('image')){
            $destinationPath = 'images/';
            $profileImage = date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['image'] = "$profileImage";
        }

        $product = Product::create($data);
        $productCreatedEvent = new ProductCreatedEvent(
            $product->id,
            $product->name,
            $product->flavor,
            $product->price
        );
        event($productCreatedEvent);

        return to_route('products.index')
            ->with('message.success',"{$product->name} cadastrado com sucesso");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $inventories =  Inventory::all()->where('product_id',$product->id);

        if($inventories->count()>0){
            $total_amount = 0;
            foreach($inventories as $inventory){
                $total_amount += $inventory->amount;
            }
            $product['amount'] = $total_amount;
        }

        return view('products.show')
            ->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();

        if($image = $request->file('image')){
            File::delete("images/$product->image");
            $destinationPath = 'images/';
            $profileImage = date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['image'] = "$profileImage";
        }else{
            unset($data['image']);
        }

        $product->update($data);

        return to_route('products.index')
            ->with('message.success',"{$product->name} editado com sucesso");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        File::delete("images/$product->image");
        return to_route('products.index')
            ->with('message.success',"{$product->name} excluido com sucesso");

    }
}
