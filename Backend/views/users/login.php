<?php
//views/users/login.php
?>
<div class="container">
    <h2> from đăng Nhập</h2>
    <form action="" method="post" >
        <div class="form-group">
            <label for="username">username</label>
            <input type="text" id="username" name="username" class="form-control"> </div>
        <div class="form-group">
            <label for="password">password</label>
            <input type="password" id="password" name="password" class="form-control"> </div>
        <div class="form-group">
            <input type="checkbox" >Ghi Nhớ Đăng Nhập <br>
            <input type="submit" name="submit" value="đăng ký" class="btn btn-success">
            chưa có tài khoản , đăng ký tại <a href="index.php?controller=user&action=register">đây</a>
        </div>
    </form>
</div>
