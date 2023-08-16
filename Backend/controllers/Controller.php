<?php

class Controller
{
    public function __construct()
    {

        if(!isset($_SESSION['user'])&& $_GET['controller'] != 'user' && !in_array($_GET['action'],['register','login'])){
            $_SESSION['error']=' chưa đăng nhập k thể truy cập';
            header('location:index,php?controller=user&action=login');
            exit();
        }
    }

    public $content;

    public $error;

    public $page_title;

    /**
     * @param $file string Đường dẫn tới file
     * @param array $variables array Danh sách các biến truyền vào file
     * @return false|string
     */
    public function render($file, $variables = []) {

        extract($variables);

        ob_start();

        require $file;

        $render_view = ob_get_clean();

        return $render_view;
    }
}
