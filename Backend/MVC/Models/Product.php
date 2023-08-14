<?php
// Model/Product.php
// Model truy vấn CSDL cho sp
require_once 'Models/Model.php';
class Product extends Model {
    public function deleteData($id) {
        // + B1:
        $sql_delete = "DELETE  FROM products WHERE id=:id";
        // + b2:
        $obj_delete = $this->connection->prepare($sql_delete);
        // + B3:
        $deletes = [
            ':id' => $id
        ];
        // + B4:
        return $obj_delete->execute($deletes);
    }

    public function getList() {
        // + B1: Viết truy vấn tham số
        $sql_select_all = "SELECT * FROM products ORDER BY created_at DESC ";
        // + B2: chuẩn bị:
        $obj_select_all = $this->connection->prepare($sql_select_all);
        // + B3: Tạo mảng, bỏ qua
        // + B4: Thực thi: SELECT ko quan tâm đến kết quả sau khi thực thi
        $obj_select_all->execute();
        // + B5: Trả về mảng kết hợp 2 chiều
        $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }


    public function insertData($name, $price) {
        // + B1: Viết truy vấn dạng tham số
        $sql_insert = " INSERT INTO products(name,price) VALUE (:name, :price)";
        // + B2: Chuẩn bị
        $obj_insert = $this->connection->prepare($sql_insert);
        // + B3: Tạo mảng truyền giá trị thật cho câu truy vấn
        $insert = [
            ':name' => $name,
            ':price' => $price
        ];
        // + B4: Thực thi: INSERT UPDATE DELETE trả về boolean
        $is_insert = $obj_insert->execute($insert);
        return $is_insert;
    }
}