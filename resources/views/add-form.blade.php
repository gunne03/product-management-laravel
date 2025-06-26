<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Management - Add Product</title>
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
        <a class="nav-link " aria-current="page" href="{{ route('view')}}">All Products</a>
        <a class="nav-link active" href="{{ route('view')}}">Add Product</a>
      </div>
         </div>
        </div>
    </nav>
    <div class="container">
        <div class="d-inline-flex p-2">
            <form method="post" action="{{ route('add.item')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="productName" class="form-label">Add Product</label>
                    <input type="text" name="product_name" class="form-control" id="">
                </div>
                @error('product_name')
                    <div class="alert alert-danger mt-2"> {{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="productPrice" class="form-label">Add Price</label>
                    <input type="number" name="product_price" class="form-control" id="">
                </div>

                @error('product_price')
                    <div class="alert alert-danger mt-2"> {{ $message }}</div>
                @enderror
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile02" name="product_image">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>

                @error('product_image')
                    <div class="alert alert-danger mt-2"> {{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-primary">Submit</button>

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

            </form>

           
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>