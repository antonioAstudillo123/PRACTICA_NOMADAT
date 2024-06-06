<?php

namespace App\Services\Products;

use App\Repositories\Products\ProductRepository;


class ProductService{

    private $repositorio;

    public function __construct(ProductRepository $repositorio)
    {
        $this->repositorio = $repositorio;
    }


    public function allProducts()
    {
        return $this->repositorio->allProducts();
    }

    public function getProduct($id)
    {
        return $this->repositorio->getProduct($id);
    }


    public function searchProduct($search)
    {
        return $this->repositorio->searchProduct($search);
    }

    public function createProduct(array $data)
    {
        return $this->repositorio->createProduct($data);
    }

    public function updateProduct(array $data)
    {
        return $this->repositorio->updateProduct($data);
    }

    public function deleteProduct($idProduct)
    {
        return $this->repositorio->deleteProduct($idProduct);
    }

}
