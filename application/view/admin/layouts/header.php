<?php
if (!isset($_SESSION['login'])){
    $this->route('user/login');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>


    <link rel="stylesheet" href="<?php $this->asset('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php $this->asset('css/style.css') ?>">
</head>
<body>
<div class="topmenu">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary" target="_blank" href="<?php $this->url(''); ?>">نمایش سایت</a>
                <a class="btn btn-danger" href="<?php $this->url('user/logout'); ?>">خروج</a>

            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="admin-container">
        <div class="row">


            <?php $this->include('admin.layouts.menu'); ?>

            <div class="col-md-10">
                <div class="content-panel">
                    <div class="container-fluid">