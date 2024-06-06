@extends('layouts.app')

@section('content')

    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                Actualizar producto
            </div>
            <div class="card-body">
                <form action="/update" method="post"" >
                    @csrf

                    <div class="row mb-3">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="nombreProduct">Nombre</label>
                                <input type="text" class="form-control" name="nombreProduct"  placeholder="No tiene nombre" value="{{ $product->nombre }}">
                                <input name="idProduct" type="hidden" value="{{ $product->id }}">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="categoria">Categoría</label>
                                <select name="categoria" class="form-control">
                                    <option disabled selected>-- Selecciona una opción --</option>
                                    @foreach ($categories as $category )
                                        @if($product->category_id === $category->id)
                                            <option selected value="{{ $category->id }}">{{ $category->category }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                                        @endif
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="precioProduct">Precio</label>
                                <input type="number" class="form-control" name="precioProduct"  value="{{ $product->precio }}"  placeholder="0">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="cantidadProduct">Cantidad</label>
                                <input type="number" class="form-control" name="cantidadProduct" value="{{ $product->cantidad }}"  placeholder="Ingresa la cantidad del producto">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <label for="estatus">Estatus</label>
                                <select name="estatus" class="form-control">
                                        @if($product->estatus == 1)
                                            <option selected value="{{ $product->estatus}}">Activo</option>
                                            <option  value="0">Inactivo</option>
                                        @else
                                            <option selected value="{{ $product->estatus }}">Inactivo</option>
                                            <option  value="1">Activo</option>
                                        @endif
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="descripcionProduct">Descripción</label>
                                <textarea class="form-control" name="descripcionProduct"  rows="3" placeholder="Ingresa una descripción">{{ $product->descripcion }}</textarea>
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Actualizar producto</button>
                </form>
            </div>
        </div>
    </div>

@endsection


@section('scriptsPage')

    <script src="{{ asset('js/products/create.js') }}"></script>

@endsection
