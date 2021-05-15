<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

    <style>
    </style>
</head>
<body>
    <div class="products mt-4">
        <div class="container">
            <div class="row">
                @foreach ($products as $product)
                <div class="col-md-4 pb-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $product->feature_image_path }}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">
                            {{ number_format($product->price) }} VND
                        </p>

                        <p class="card-text">
                            {!! $product->content !!} VND
                        </p>
                        <a href="#" class="btn btn-primary">Add to cart</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>