<?php
?>
<!-- layout động là bố cục có các biến php được xử lý động theo từng chức năng-->
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $this->page_title; ?></title>
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="assets/js/script.js"></script>

    </head>
    <body>
    <?php
    if(isset($_SESSION['success'])){
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
    if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>

    <h3 style=color:red><?php echo $this->error; ?></h3>
    <div id="header">header</div>
    <div id="main"> <?php echo $this->content;  ?></div>

    <div id="footer">footer</div>
    </body>
</html>
