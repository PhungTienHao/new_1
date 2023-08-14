<?php
// models truy vấn csdl cho sản phẩm
require_once 'model/model.php';
class Product extends Model{
    public function getList(){
        //b1 viết truy vấn
        $sql_select_all ="SELECT * FROM products order by created_at DESC";
        //b2 cbi
        $obj_select_all = $this->connection->prepare($sql_select_all);
        //b3 tạo mảng,bỏ qua
        //b4 thực thi :select k quan tâm đến kết quả sau khi thực thi
        $obj_select_all->execute();
        //b5 trả về mảng kết hợp 2 chiều
        $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function insertData($name,$price){
        //b1 viết truy vấn dạng tham số
        $sql_insert="insert into products (name,price) values (:name,:price)";
        $obj_insert=$this->connection->prepare($sql_insert);
        $inserts=[
            ':name'=>$name,
        ':price'=>$price
        ];
        //b4 thực thi insert delete update trả về boolean
        $is_insert=$obj_insert->execute($inserts);
        return $is_insert;
    }
    public function deleteData($id){
        $sql_delete ="delete from products where id=:id";
            $obj_delete = $this->connection->prepare($sql_delete);
            $deletes=[
                ':id'=>$id
            ];
            return $obj_delete->execute($deletes);

    }
}
