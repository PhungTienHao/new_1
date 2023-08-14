<!--
- File index gốc của ứng dụng MVC, tên file luôn luôn là index.php, là file quan trọng nhất trong MVC
- file này là nơi đầu tiên bắt request từ user gữi lên
-> phân tích URL -> gọi đúng controller tương ứng để xử lý -> logic vận hành MVC
- Trong mvc quy định url phải tuân theo 1 format nào đó với code mvc này, bát buộc url có format sau:
+ thêm mới
index.php?controller=product&action=create
+Sua sp:
index.php?controller=product&action=update&id=3
+Tao danh muc:
index.php?controller=category&action=create
-Ten class controller bat buoc phai dat ten theo chuan ma mo hinh quy dinh:
ProductController.php
CategoryController.php
SlideController.php
UserController.php
-->
<?php
session_start();
// Set múi giờ:
date_default_timezone_set('Asia/Ho_Chi_Minh');
echo date('d-m-Y H:i:s');

// phân tích URL, demo url thêm mới sp, bằng cách lấy ra tham số controller và action từ url
// index.php?controller=product&action=create
// Nếu là 1 trang chủ, là 1 trang ko chuyền tham số nào thì sẽ gán 1 controller mặc định
$controller = isset($_GET['controller']) ?
    $_GET['controller'] : 'home';
var_dump($controller);
// Lấy action:
$action = isset($_GET['action']) ? $_GET['action'] :'default';
var_dump($action);// create
// - Chuyển đổi controller lấy dc thành tên file tương ứng của class controller
// product -> ProductController
$controller = ucfirst($controller); //Product
$controller .= "controller"; //ProductController
// - Nhúng file controller (gọi controller)
// + Quy tắc nhúng file trong MVC: luôn luôn phải tư duy là đứng từ file index gốc để nhúng file
$controller_path = "Controllers/$controller.php";
if (!file_exists($controller_path)) {
    die('trang bạn tìm ko tồn tại');
}
require_once "$controller_path";
// Khởi tạo đối tượng từ class controller vừa nhúng
$obj = new $controller();
// - Dùng đối tượng trên truy cập phương thức lấy từ url để bắt đầu thực thi chức năng
if (!method_exists($obj, $action)) {
    die("phương thức $action ko tồn tại trong class $controller");
}

$obj->$action();
?>