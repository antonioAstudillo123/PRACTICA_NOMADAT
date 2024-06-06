<div>

    <div class="container mt-5">

        @if (session('mensajeExito'))
            <div class="alert alert-success">
                {{ session('mensajeExito') }}
            </div>
        @endif
        @if (session('mensajeError'))
            <div class="alert alert-danger">
                {{ session('mensajeError') }}
            </div>
        @endif

        <div class="d-flex justify-content-between mb-3">
            <div>
                <a class="btn btn-success" href="{{ route('product.create') }}" >Crear producto</a>
            </div>

            <div>
                <input wire:keydown="search" wire:model="search_word" type="text" class="form-control" placeholder="Buscar producto...">
            </div>


        </div>

        <div class="card">
            <div class="card-header">
                CRUD de productos
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Opciones</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->nombre }}</td>
                            <td>{{ $product->descripcion }}</td>
                            <td>{{ $product->precio }}</td>
                            <td>{{ $product->cantidad }}</td>
                            <td>{{ $product->category_name }}</td>
                            <td>{{ $product->fecha_creacion }}</td>
                            @if($product->estatus)
                                <td>Activo</td>
                            @else
                                <td>Inactivo</td>
                            @endif

                            <td>
                                <div>
                                    <a href="{{ route('product.update' , ['id' => $product->id]) }}" class="btn btn-warning">Editar</a>
                                    <button  wire:click='deleteProduct({{ $product->id }})' class="btn btn-danger">Eliminar</button>
                                </div>
                            </td>
                          </tr>
                        @endforeach

                    </tbody>
                  </table>
            </div>

            <div class="card-footer">
                {{ $products->links() }}
            </div>
        </div>
    </div>



</div>
