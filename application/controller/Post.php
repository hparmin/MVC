<?php

namespace application\controller;
use application\model\Post as PostModel;
use application\model\Category as CatModel;
class Post extends Controller
{
    public function index()
    {
        $cat = new CatModel();
        $categories = $cat->all();

        $post = new PostModel();
        $posts = $post->all();
        $count = count($posts);
        $this->view('admin.post.index',compact('posts','count','categories'));
    }

    public function create()
    {
        $cat = new CatModel();
        $cats = $cat->all();
        $this->view('admin.post.create',compact('cats'));
    }

    public function store()
    {
        $insert= new PostModel();

        $title=$_POST['title'];
        $text=$_POST['text'];

        if (is_array($_POST['cat'])){
            $cats=implode(',',$_POST['cat']);
        }else{
            $cats= $_POST['cat'];
        }
        if (empty($cats)){
            $cats = "";
        }
        $info=array($title,$text,$cats);

        $insert->insert($info);
        $this->route('post/index');
    }

    public function edit($id)
    {
        $cat = new CatModel();
        $cats = $cat->all();
        $post = new PostModel();
        $current_post = $post->find($id);
        $this->view('admin.post.edit',compact('current_post','cats'));
    }

    public function update($id)
    {
        $title=$_POST['title'];
        $text=$_POST['text'];

        if (is_array($_POST['cat'])){
            $cats=implode(',',$_POST['cat']);
        }else{
            $cats= $_POST['cat'];
        }
        if (empty($cats)){
            $cats = "";
        }
        $info=array($title,$text,$cats);


        $up = new PostModel();
        $up->update($info,$id);
        $this->reback();
    }

    public function destroy($id)
    {
        $del = new PostModel();
        $del->delete($id);
        $this->reback();
    }
}