<?php
$this->include('app.layouts.header');
?>
    <div class="title-main">
        <h4>آخرین محصولات</h4>
    </div>

    <div class="container-fluid post-container">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <?php if (isset($posts) && !empty($posts)): ?>
                        <?php foreach ($posts as $post): ?>
                            <article class="post">
                                <div class="thumb">
                                    <img src="<?php $this->asset('img/default.jpg') ?>" width="260" height="150">
                                </div>
                                <div class="post-title">
                                    <h2><a target="_blank" href='<?php echo $this->url("posts/single/$post->id"); ?>' dideo-checked="true"><?php echo $post->title; ?></a>
                                    </h2>
                                </div>
                                <div class="clearfix"></div>
                                <div class="post-txt">
                                    <h4><?php echo $post->text; ?></h4>
                                </div>
                                <div class="post-foot-container">
                                    <div class="line-border"></div>
                                    <div class="p-c-view"><i class="fa fa-eye"></i>1395/6/26</div>
                                    <div class="p-c-comment"><i class="fa fa-comment"></i></div>
                                    <div class="p-c-view"><i class="fa fa-comment"></i> نویسنده : آرمین حاجی پور</div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

<?php
$this->include('app.layouts.footer');
?>