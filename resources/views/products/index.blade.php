{{-- @extends('welcome')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Ajout de produits</h2>
            </div>
            <div class="text-center">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Prix</th>
            <th>Transport</th>
            <th>Délai Clôture</th>
            <th>Details</th>
            <th>Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td><img src="{{ URL::asset("storage/images/". $product->imageProd) }}" width="100px" height="100px"></td>
                <td>{{ $product->nameProd }}</td>
                <td>{{ $product->prixProd }}</td>
                <td>{{ $product->transport }}</td>
                <td>{{ $product->delaiCloture }}</td>
                <td>{{ $product->details }}</td>
                <td>
                    <form action="{{ route('products.destroy', $product->idProd) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('products.edit', $product->idProd) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $products->links() !!}

@endsection

 --}}


{{-- Pour le client --}}
 @extends('welcome')

 @section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h2>Ajout de produits</h2>
        </div>
        <div class="text-center">
            <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="row">
    @foreach($products as $product)
        <div class="col-xs-12 col-sm-6 col-md-3" style="margin-top: 10px;">
            <div class="card">
                <img src="{{ URL::asset("storage/images/" . $product->imageProd) }}" class="card-img-top" alt="{{ $product->nameProd }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->nameProd }}</h5>
                    <h5 class="card-title">{{ $product->prixProd }} XOF</h5>
                    <p class="card-text"><strong>Transport: </strong> {{ $product->transport }}</p>
                    <p class="card-text"><strong>Délai Clôture: </strong> {{ $product->delaiCloture }}</p>
                    <p class="card-text">{{ $product->details }}</p>
                    <div class="text-center">
                        <a href="{{ route('add_to_cart', $product->idProd) }}" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    <div class="col-lg-12">
        {!! $products->links() !!}
    </div>
</div>
 
@endsection