<?php
$this->include('admin.layouts.header');
?>

<p class="title-form"> ویرایش پست </p>
<form class="my-form" method="post" action="<?php echo $this->url('post/update/').$current_post->id; ?>">    <div class="row">
        <div class="col-8">
            <label> عنوان پست را ویرایش کنید. </label>
            <br>
            <input class="form-control inputbig" type="text" name="title" value="<?php echo $current_post->title; ?>">
            <br>
            <textarea rows="12" name="text" style="max-width: 100%; min-width: 100%; padding: 10px;"><?php echo $current_post->text; ?></textarea>
        </div>
        <div class="col-4">
            <div style="background-color: #fff; padding: 10px;">
                <input type="submit" class="btn btn-primary" value="ارسال">
            </div>
            <div style=" margin: 10px 0px; background-color: #fff; padding: 10px;">
                <?php
                    $post_cats = explode(',',$current_post->cat_id);
                ?>
                <?php foreach ($cats as $cat): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="cat[]" value="<?php echo $cat->id; ?>" id="<?php echo $cat->id; ?>"

                            <?php
                                foreach ($post_cats as $current_cat):
                                if ($current_cat == $cat->id){
                                    echo " checked ";
                                }
                                endforeach;
                            ?>

                        >
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

