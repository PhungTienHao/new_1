<?php
//views/users/register.php
require_once "controllers/UserController.php";
require_once "models/User.php";

?>
<body>
<div class="container">
    <h2> from đăng ký</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="username">nhập tên đăng nhập</label>
            <input type="text" id="username" name="username" class="form-control"> </div>
        <div class="form-group">
            <label for="password">nhập mật khẩu</label>
            <input type="password" id="password" name="password" class="form-control"> </div>
        <div class="form-group">
            <label for="repas">nhập lại mật khẩu</label>
            <input type="password" id="repas" name="repas" class="form-control"> </div>
        <div class="form-group">
            <label for="name">nhập họ tên</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="phone" > nhập số điện thoại</label>
            <input type="text" id="phone" name="phone" class="form-control">
        </div>
        <div class="form-group">
            <label for="email" > nhập email </label>
            <input type="email" id="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="address" > nhập địa chỉ</label>
            <textarea type="text" id="address" name="address" class="form-control" ></textarea>
        </div>

        <div class="form-group">
            <label for="avatar" >Chọn Ảnh Đại Diện của bạn</label>
            <input type="file" id="avatar" name="avatar" class="form-control">
        </div>
        <div class="form-group" >

            <input type="submit" name="submit" value="đăng ký"  class="btn btn-success">

        </div>
        <div>Đã có tài khoản , đăng nhập tại <a href="index.php?controller=user&action=login">đây</a><br></div>
    </form>
</div>
</body>


