<?php
//views/users/register.php


?>
<div class="container">
    <h2> from đăng ký</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="username">username</label>
            <input type="text" id="username" name="username" class="form-control"> </div>
        <div class="form-group">
            <label for="password">password</label>
            <input type="password" id="password" name="password" class="form-control"> </div>
        <div class="form-group">
            <label for="repas">nhập lại mật khẩu</label>
            <input type="password" id="repas" name="repas" class="form-control"> </div>
        <div class="form-group">
            <label for="name">nhập họ tên</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>
        <div class="form-group">
            <lable for="phone" > nhập số điện thoại</lable>
            <input type="text" id="phone" name="phone" class="form-control">
        </div>

        <div class="form-group">
            <lable for="address" > nhập địa chỉ</lable>
            <input type="text" id="address" name="address" class="form-control">
        </div>
        <div class="form-group">
            <lable for="email" > nhập email </lable>
            <input type="email" id="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <lable for="avatar" >Chọn Ảnh Đại Diện của bạn</lable>
            <input type="file" id="avatar" name="avatar" class="form-control">
        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="đăng ký" class="btn btn-success">
        </div>
    </form>
</div>


