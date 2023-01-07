<?php

namespace App\Http\Controllers;

use App\Jobs\ProductCreated;
use App\Jobs\ProductDeleted;
use App\Jobs\ProductUpdated;
use Illuminate\Http\Request;
use App\Models\product;
use Symfony\Component\HttpFoundation\Response;

class productController extends Controller
{
    public function index()
    {
        return product::all();
    }

    public function show($id)
    {
        return product::find($id);
    }

    public function store(Request $request)
    {
        $product = Product::create($request->only('title', 'image'));

//        ProductCreated::dispatch($product->toArray())->onQueue('main_queue');
        ProductCreated::dispatch($product->toArray());

        return response($product, Response::HTTP_CREATED);
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);


        
        

        $product->update($request->only('title', 'image'));
        


//        ProductUpdated::dispatch($product->toArray())->onQueue('main_queue');

        ProductUpdated::dispatch($product->toArray());

        return response($product, Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        Product::destroy($id);

        // ProductDeleted::dispatch($id)->onQueue('main_queue');

        ProductDeleted::dispatch($id);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
