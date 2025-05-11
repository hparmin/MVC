<?php
$this->include('admin.layouts.header');
?>

<p class="title-form">ویرایش دسته </p>
<form class="my-form" method="post" action="<?php echo $this->url('category/update/').$current_cat->id; ?>">
    <div class="row">
        <div class="col-md-9">

            نام دسته را ویرایش کنید : <br><br>
            <input class="form-control inputbig" type="text" name="title" value="<?php echo $current_cat->title; ?>">

            <br>
            <input type="submit" value="ذخیره" class="btn btn-primary">
        </div>



    </div>
</form>

<?php
$this->include('admin.layouts.footer');
?>

