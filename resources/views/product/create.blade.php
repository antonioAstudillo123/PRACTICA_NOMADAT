@extends('layouts.app')

@section('content')

    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                Crear producto
            </div>
            <div class="card-body">
                <form action="/create" method="post"" >
                    @csrf

                    <div class="row mb-3">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="nombreProduct">Nombre</label>
                                <input type="text" class="form-control" name="nombreProduct" value="{{ old('nombreProduct') }}"  placeholder="Ingresa el nombre del producto">
                                @error('nombreProduct') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="categoria">Categoría</label>
                                <select name="categoria" class="form-control">
                                    <option disabled selected>-- Selecciona una opción --</option>
                                    @foreach ($categories as $category )
                                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                                    @endforeach
                                </select>
                                @error('categoria') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="precioProduct">Precio</label>
                                <input type="number" class="form-control" name="precioProduct" value="{{ old('precioProduct') }}"   placeholder="Ingresa el precio del producto">
                                @error('precioProduct') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="cantidadProduct">Cantidad</label>
                                <input type="number" class="form-control" name="cantidadProduct" value="{{ old('cantidadProduct') }}"  placeholder="Ingresa la cantidad del producto">
                                @error('cantidadProduct') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="descripcionProduct">Descripción</label>
                                <textarea class="form-control" name="descripcionProduct" rows="3" placeholder="Ingresa una descripción">{{ old('descripcionProduct') }}</textarea>
                                @error('descripcionProduct') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Crear producto</button>
                </form>
            </div>
        </div>
    </div>

@endsection


@section('scriptsPage')

    <script src="{{ asset('js/products/create.js') }}"></script>

@endsection
