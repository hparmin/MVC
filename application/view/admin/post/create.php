<?php
$this->include('admin.layouts.header');
?>
<form method="post" action="<?php $this->url('post/store'); ?>">
    <div class="row">
        <div class="col-8">
            <label> عنوان پست را وارد کنید. </label>
            <br>
            <input class="form-control" type="text" name="title" placeholder="عنوان پست">
            <br>
            <textarea rows="12" name="text" style="max-width: 100%; min-width: 100%; padding: 10px;"></textarea>
        </div>
        <div class="col-4">
            <div style="background-color: #fff; padding: 10px;">
                <input type="submit" class="btn btn-primary" value="ارسال">
            </div>
            <div style=" margin: 10px 0px; background-color: #fff; padding: 10px;">
                <?php foreach ($cats as $cat): ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="cat[]" value="<?php echo $cat->id; ?>" id="<?php echo $cat->id; ?>">
                    <label class="form-check-label" for="<?php echo $cat->id; ?>">
                        <?php
                            echo $cat->title;
                        ?>
                    </label>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</form>
<?php
$this->include('admin.layouts.footer');
?>

