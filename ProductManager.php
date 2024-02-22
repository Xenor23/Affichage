<?php
require_once "User.php";


class ProductManager{
    public function insertProduct (Product $product){
        $stmt=$this->db->prepare("INSERT INTO users (name,price,quantity) VALUES (?,?,?)");
        $product_valid=$stmt->execute([$product->getName(), $product->getPrice(), $product->getQuantity()]);
        return $product_valid;
    }
}