<?php
require_once 'controllers/Controller.php';
require_once 'Models/Product.php';
// Controller xử lý sp
class ProductController extends Controller {

    // index.php?controller=product&action=create
    public function create() {
        // - xử lý form:
        //Debug:
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            // Validate:
            // - Phải nhập tên và giá
            // - giá phải là số
            if (empty($name) || empty($price)) {
                $this->error = 'Phải nhập tên và giá';
            }elseif (!is_numeric($price)) {
                $this->error = 'Giá phải là sô';
            }
            // Nếu ko có lỗi thì xử lý logic chích
            if (empty($this->error)) {
                // - Controller gọi Model để insert vào CSDL = khởi tạo đối tượng từ model
                $product_model = new Product();
                $is_insert = $product_model->insertData($name, $price);
                var_dump($is_insert);
                if ($is_insert) {
                    $_SESSION['success'] = 'Thêm mới thành công';
                    header('Location:index.php?controller=product&action');
                    exit();
                }
            }
        }

     //   echo 'Tạo mới sp';
        // - Gọi view để hiển thị
        // + Gán các giá trị tương ứng cho thuộc tính của controller cha
        $this->page_title = 'Trang tạo thêm mới sp';
        $this->content = $this->render('views/products/create.php');
        // var_dump($this->content);
        // + gọi layout để hiển thị các giá trị lên
        require_once 'views/layouts/main.php';
    }

    // index.php?controller=product&action=index
    public function index() {
        // - Controller gọi Model
        $product_model = new Product();
        $products = $product_model->getList();
        echo '<pre>';
        print_r($products);
        echo '</pre>';

        // - Controller Gọi View
        $this->page_title = 'TRang ds sản phẩm';
        $this->content = $this->render('views/products/index.php', [
            'products' => $products,
            'abc' => 123
        ]);
        require_once  'views/layouts/main.php';
    }

    //index.php?controller=product&action=update&id=...
    public function update() {

    }

    //index.php?controller=product&action=delete&id=...
    public function delete() {
        // - Validate id
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'Tham số id ko hợp lệ';
            header('location:index.php?controller=product&action=index');
            exit();
        }
        $id = $_GET['id'];
        // - Controller gọi Model
        $product_model = new Product();
        $is_delete = $product_model->deleteData($id);
        var_dump($is_delete);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa thành công';

        }else{
            $_SESSION['error'] = 'Xóa thất bại';
        }
        header('location:index.php?controller=product&action=index');
        exit();
    }
}
?>