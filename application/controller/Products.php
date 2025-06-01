<?php

namespace application\controller;
use application\model\Products as ProductsModel;
class Products extends Controller
{
    public function index()
    {
        $product = new ProductsModel();
        $products = $product->all();
        $count = count($products);
        $this->view('admin.product.index',compact('products','count'));
    }

    public function create()
    {
        $this->view('admin.product.create');
    }

    public function store()
    {
        //var_dump($_POST); die();
        $insert = new ProductsModel();
        $insert->insert($_POST);
        $this->route('products/index');
    }

    public function edit($id)
    {
        $product = new ProductsModel();
        $current_product = $product->find($id);
        $this->view('admin.product.edit',compact('current_product'));
    }

    public function update($id)
    {
        $up = new ProductsModel();
        $up->update($_POST,$id);
        $this->reback();
    }

    public function destroy($id)
    {
        $del = new ProductsModel();
        $del->delete($id);
        $this->reback();
    }


    public function single($id)
    {
        $product = new ProductsModel();
        $current_product = $product->find($id);
        $this->view('app.products.single',compact('current_product'));
    }
}