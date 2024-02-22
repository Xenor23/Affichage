<?php


class ProductController{
    private ProductManager $productManager;
    private SecurityController $security;

    public function __construct()
    {
        $this->productManager=new ProductManager();
        $this->security=new SecurityController();
    }

    public function productValidation(): void
    {
        $name= $this->security->cleanInput($_POST['name']);
        $price= $this->security->cleanInput($_POST['price']);
        $quantity= $this->security->cleanInput($_POST['quantity']);
        $csrfToken=$this->security->cleanInput($_POST['csrf_token']);

        if (!$this->security->verifyCsrfToken($csrfToken)){
            DisplayController::messageAlert("Veuillez réessayer plus tard", DisplayController::ROUGE);
        }

        if ($name==false || $price==false || $quantity==false){
            DisplayController::messageAlert("Tous les champs sont requis", DisplayController::ROUGE);
        }

        $product= new Product($name, $price, $quantity);
        $valid=$this->productManager->insertProduct($product);
        if ($valid){
            DisplayController::messageAlert("Inscription réussie", DisplayController::VERTE);
        }else{
            DisplayController::messageAlert("Erreur lors de l'inscription", DisplayController::ROUGE);
        }
    }
}