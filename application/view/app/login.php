<?php
$this->include('app.layouts.header',compact('categories'));
?>
<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 post-single">

            <div class="post-title-single"><h1>ورود به سایت</h1></div>
            <br><br><br>
            <div class="post-txt-single">
                <form method="post">
                    نام کاربری : <br>
                    <input type="text" name="username" class="form-control" required><br>
                    رمز عبور : <br>
                    <input type="text" name="password" class="form-control" required><br>


                    <input type="submit" name="send" value="ورود" class="btn btn-primary">
                    <p id="user-error"> نام کاربری اشتباه است. </p>
                    <p id="pass-error"> رمز عبور نا معتبر. </p>
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