<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Services\ProductService;
use App\Services\TagService;

class ProductController extends Controller
{
    protected ProductService $serviceProduct;
    protected TagService $serviceTag;

    public function __construct(ProductService $productService, TagService $tagService)
    {
        $this->serviceProduct = $productService;
        $this->serviceTag = $tagService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->serviceProduct->getAll();
        $data = ['products' => $products];
        return view('products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = $this->serviceTag->getAll();
        $data = ['tags' => $tags];
        return view('products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $this->serviceProduct->create($request->all());
        return redirect()->route('products.index')->with('status', 'Produto salvo!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->serviceProduct->findById($id);
        $tags = $this->serviceTag->getAll();
        $data = ['product' => $product, 'tags' => $tags];
        return view('products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
        $this->serviceProduct->update($id, $request->all());
        return redirect()->route('products.index')->with('status', 'Produto atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->serviceProduct->delete($id);
        return redirect()->route('products.index')->with('status', 'Produto deletado!');
    }
}
