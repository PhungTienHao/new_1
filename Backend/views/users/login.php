<?php
//views/users/login.php
?>
<body id="body">

<div class="container">
    <h1 class="h-user">  đăng Nhập</h1>
    <form action="" method="post" >
        <div class="form-group" >
            <label for="username">username : </label>
            <input type="text" id="username" name="username" class="form-control" >
        </div>
        <div class="form-group">
            <label for="password">password :</label>
            <input type="password" id="password" name="password" class="form-control" >
        </div>
        <div class="form-group">
            <input type="checkbox" >Ghi Nhớ Đăng Nhập <br>

            <input type="submit" name="submit" value="đăng nhập" class=" btn btn-success">
            <br>
             Nếu chưa có tài khoản , đăng ký  <a href="index.php?controller=user&action=register"> tại đây</a>

</div>
    </form>
</div>
</body>
