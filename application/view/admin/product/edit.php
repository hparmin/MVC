<?php
$this->include('admin.layouts.header');
?>

<p class="title-form">ویرایش محصول </p>
<form class="my-form" method="post" action="<?php echo $this->url('products/update/').$current_product->id; ?>">
    <div class="row">
        <div class="col-md-9">

            نام محصول را ویرایش کنید : <br><br>
            <input class="form-control inputbig" type="text" name="title" value="<?php echo $current_product->title; ?>">
            <br>
            <textarea style="min-width: 100%; max-width: 100%; padding: 10px" name="product_text" rows="12"><?php echo $current_product->text; ?></textarea>
            <br>
            <input class="form-control inputbig" type="text" name="text" value="<?php echo $current_product->price; ?>">
            <br>
            <input type="submit" value="ذخیره" class="btn btn-primary">
        </div>



    </div>
</form>

<?php
$this->include('admin.layouts.footer');
?>

