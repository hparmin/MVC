<?php
$this->include('admin.layouts.header');
?>
<form method="post" action="<?php htmlspecialchars($this->url('category/store')); ?>">
    <label> نام دسته را وارد کنید. </label>
    <br>
    <input style="width: 50%;" class="form-control" type="text" name="category" placeholder="نام دسته جدید">
    <br>
    <input type="submit" class="btn btn-primary" value="ارسال">
</form>
<?php
$this->include('admin.layouts.footer');
?>

