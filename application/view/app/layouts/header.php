<?php
use application\model\Category as CategoryModel;
$category = new CategoryModel();
$categories = $category->all();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php $this->asset('css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?php $this->asset('css/owl.theme.default.min.css') ?> ">
    <link rel="stylesheet" href="<?php $this->asset('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php $this->asset('css/style.css') ?>">


</head>
<body>
<div class="container-fluid header">
    <div class="container">
        <div class="row">
            <div class="col-md-6 logo">
                <a href="<?php $this->url(''); ?>">
                    <img src="<?php $this->asset('img/logo.png') ?>" width="160" height="50">
                </a>
            </div>
            <div class="col-md-6 link">
                <?php

                if (isset($_SESSION['login'])){
                    ?>
                    <a href="<?php $this->url('admin'); ?>" class="login">پنل کاربری</a>
                    <a href="<?php $this->url('user/logout'); ?>" class="sabtnam">خروج</a>
                    <?php
                }else{
                    ?>
                    <a href="<?php $this->url('user/login'); ?>" class="login">ورود به سایت</a>
                    <a href="<?php $this->url('user/register'); ?>" class="sabtnam">ثبت نام کنید</a>
                    <?php
                }
                ?>


            </div>


            <aside class="menu-bar">
                <nav id="menu_item">
                    <ul class="menu">
                        <?php if (isset($categories) && !empty($categories)): ?>
                            <?php foreach ($categories as $category): ?>
                            <li class="fa fa-wikipedia-w menu-item menu-item-type-custom menu-item-object-custom menu-item-4459">
                                <a href="<?php echo $this->url("category/storage/"). $category->id; ?>" dideo-checked="true"><?php echo $category->title; ?></a></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </nav>
            </aside>
        </div>
    </div>
</div>