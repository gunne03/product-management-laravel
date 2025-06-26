<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Management - View All Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Product Management</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="{{ route('view')}}">All Products</a>
        <a class="nav-link" href="{{ route('add.form')}}">Add Product</a>
      </div>
    </div>
  </div>
</nav>
<div class="container">
  <table class="table">
  <thead>
    <tr><!--Heading-->
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Image</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
   @foreach($products as $product)
   <tbody><!--Data-->
    <tr>
        <th scope="row">{{$loop->iteration }}</th>
      <td>{{ $product->product_name}}</td> <!--product name-->      
      <td>{{ $product->product_price}}</td><!--product price-->
      <td>
        <img src="{{ URL::asset('/uploads'). '/'. $product->product_image}}" alt="{{ $product->product_name}}" class="img-thumbnail" width="100">
      </td>
      <td>
        <a href="{{ route('edit.form', $product->id)}}" class="btn btn-warning btn-sm m-1">Edit</a>
        <form action="{{ route('delete.product', $product->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm m-1">Delete</button>
        </form>
      </td>    
      
    </tr>
  </tbody>
  @endforeach

  @if (Session::has('success'))
                        <div class="alert alert-success mt-4" role="alert">
                            {{ Session('success')}}
                        </div>
                  @endif

                  @if (Session::has('error'))
                        <div class="alert alert-danger mt-4" role="alert">
                            {{ Session('error')}}
                        </div>
                  @endif

</table>
<div class="row">
  {{ $products->links('pagination::bootstrap-4')}}
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>