<?php
$this->include('app.layouts.header',compact('categories'));
?>
<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 post-single">

            <div class="post-title-single"><h1>ثبت نام</h1></div>
            <br><br><br>
            <div class="post-txt-single">
                <form method="post">
                    نام کاربری : <br>
                    <input type="text" name="username" class="form-control" required><br>
                    رمز عبور : <br>
                    <input type="password" name="password" class="form-control" required><br>

                    <input type="submit" value="ثبت نام" class="btn btn-primary">
                </form>
                <br>
            </div>
        </div>

    </div>
</div>

<br>
<br>
<?php
$this->include('app.layouts.footer');
?>