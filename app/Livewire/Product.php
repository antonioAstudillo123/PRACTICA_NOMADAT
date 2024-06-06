<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Services\Products\ProductService;

class Product extends Component
{
    use WithPagination;
    private $servicio;
    public $search_word = '';

    public function boot(ProductService $servicio)
    {
        $this->servicio = $servicio;

    }


    public function render()
    {
        if($this->search_word !== '')
        {
            $products = $this->servicio->searchProduct($this->search_word);
        }else{
            $products = $this->servicio->allProducts();
        }


        return view('livewire.product' , ['products' => $products]);
    }


    public function search()
    {
        $this->render();
    }


    public function deleteProduct($id){
        $this->servicio->deleteProduct($id);

        session()->flash('mensajeExito', '¡Producto eliminado con éxito!');

        $this->render();
    }



}
