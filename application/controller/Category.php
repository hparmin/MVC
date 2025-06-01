<?php

namespace application\controller;
use application\model\Category as CategoryModel;
use application\model\Post as PostModel;
class Category extends Controller
{
    public function index()
    {
        $category = new CategoryModel();
        $categories = $category->all();
        $count = count($categories);
        $this->view('admin.category.index',compact('categories','count'));
    }

    public function create()
    {
        $this->view('admin.category.create');
    }

    public function store()
    {
        $insert = new CategoryModel();
        $insert->insert($_POST);
        $this->route('category/index');
    }

    public function edit($id)
    {
        $cat = new CategoryModel();
        $current_cat = $cat->find($id);
        $this->view('admin.category.edit',compact('current_cat'));
    }

    public function update($id)
    {
        $up = new CategoryModel();
        $up->update($_POST,$id);
        $this->reback();
    }

    public function destroy($id)
    {
        $del = new CategoryModel();
        $del->delete($id);
        $this->reback();
    }

    public function storage($id)
    {
        $posts = new PostModel();
        $posts = $posts ->category_find($id);
//        $category = new CategoryModel();
//        $categories = $category->all();
        $this->view('app.category.storage',compact('posts'));
    }
}