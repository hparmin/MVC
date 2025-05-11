<?php
$this->include('admin.layouts.header');
?>
<form method="post" action="<?php $this->url('products/store'); ?>">
    <label> نام محصول را وارد کنید. </label>
    <br>
    <input style="width: 50%;" class="form-control" type="text" name="product_title" placeholder="نام محصول جدید">
    <br>
    <textarea style="min-width: 50%; max-width: 50%; padding: 10px;" name="product_text" rows="12"></textarea>
    <br>
    <input style="width: 50%;" class="form-control" type="text" name="product_price" placeholder="قیمت">
    <br>
    <input type="submit" class="btn btn-primary" value="ارسال">
</form>
<?php
$this->include('admin.layouts.footer');
?>

