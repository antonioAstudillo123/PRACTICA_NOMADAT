<?php

namespace App\Services\Categories;

use App\Repositories\Categories\CategoryRepository;

class CategoryService{

    private $repositorio;


    public function __construct(CategoryRepository $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    public function getCategories()
    {
        return $this->repositorio->getCategories();
    }

}
