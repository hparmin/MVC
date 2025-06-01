<?php
$this->include('app.layouts.header');
?>
<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <?php if (isset($current_product)): ?>
            <div class="post-single">
                <div class="post-title-single"><h1><?php echo $current_product->title; ?></h1>
                    <div class="clearfix"></div>
                    <div class="entry-meta">
                        <div class="view">
                            دسته بندی :
                            <ul class="post-categories">
                                <li><a href="" rel="category tag"></a></li>
                            </ul>
                        </div>

                        <div class="view"><i class="fa fa-comment"></i>
                            منتشر شده در :
                        </div>
                        <div class="view"><i class="fa fa-user"></i><span> نویسنده : </span>
                        </div>
                        <div class="view"><i class="fa fa-user"></i><span> آیدی مقاله : </span>
                        </div>
                    </div>

                </div>


                <div class="clearfix"></div>
                <div class="thumb-single-product"><img src="img/default.jpg" class="attachment-medium size-medium wp-post-image" alt=""></div>

                <div class="post-txt-single">
                    <p>
                        <?php echo $current_product->text; ?>
                    </p>
                </div>
            </div>
            <?php endif; ?>

            <div class="box-comment">
                <?php if (!isset($_SESSION['login'])): ?>
                    <h3>نظر خود را در رابطه با این مقاله وارد کنید</h3>
                    <h3>برای ثبت نظر ابتدا باید
                        <a class="btn btn-warning" href="<?php $this->url('user/login'); ?>">وارد شوید</a>
                        یا
                        <a class="btn btn-primary" href="<?php $this->url('user/register'); ?>"> ثبت نام کنید </a>
                        کنید
                    </h3>
                <?php endif; ?>

                <div class="comment">
                    <img src="<?php $this->asset('img/user.png') ?>">
                    <h5>آرمین حاجی پور</h5>
                    <p>متن کامنت</p>
                </div>


                <div class="clearfix"></div>
                <?php if (isset($_SESSION['login'])): ?>
                    <br>
                    <br>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <span>متن نظر شما</span>
                        <textarea name="text"></textarea>
                        <input type="hidden" name="article_id" value="{{$single->id}}">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="user_name" value="{{Auth::user()->name}}">
                        <input type="submit" class="btn btn-success" value="ثبت نظر">
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<br>
<br>

<?php
$this->include('app.layouts.footer');
?>