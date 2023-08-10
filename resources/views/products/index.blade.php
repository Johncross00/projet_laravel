{{-- @extends('welcome')
     
@section('content') --}}
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>AJout de produits</h2>
            </div>
            <div class="pull-right">
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
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="{{ URL::asset("storage/images/". $product->imageProd) }}" width="100px"></td>
            <td>{{ $product->nameProd }}</td>
            <td>{{ $product->details }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->idProd) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('products.show',$product->idProd) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->idProd) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $products->links() !!}
        
{{-- @endsection --}}