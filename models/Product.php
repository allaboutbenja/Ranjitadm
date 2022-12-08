<?php
class Product{
    private $id;
    private $title;
    private $desc;
    private $stock;
    private $image;
    private $brand;
    private $category;
    private $price;

    function __construct($id,$title,$desc,$stock,$image,$brand,$category,$price) {
        $this->id = $id;
        $this->title = $title;
        $this->desc = $desc;
        $this->stock = $stock;
        $this->image = $image;
        $this->brand = $brand;
        $this->category = $category;
        $this->price = $price;
    }
    public function getId() {
        return $this->id;
    }
    public function getTitle() {
        return $this->title;
    }
    public function getDesc() {
        return $this->desc;
    }
    public function getStock() {
        return $this->stock;
    }

    public function getImage() {
        return $this->image;
    }
    
    public function getBrand() {
        return $this->brand;
    }
    public function getCategory() {
        return $this->category;
    }
    public function getPrice() {
        return $this->price;
    }
}
?>