<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">My Website</a>
        <a href="{{ route('logout') }}" class="btn btn-danger"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
         Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </nav>

    <!-- Shop Details -->
    <div class="container mt-5">
        <!-- Display store name -->
        <h2 class="text-center">{{ $storelist->store_name }}</h2>
        <p>Categories: {{ $categoriesCount }} | Products: {{ $productsCount }}</p>

        <!-- Categories -->
        <div class="row">
            @if ($categories->isEmpty()) <!-- Check if there are no categories -->
                <p>No categories found for this store.</p>
            @else
                @foreach ($categories as $category)
                    <div class="col-md-6">
                        <h4>{{ $category->category_name }}</h4>

                        <!-- Products under each category -->
                        <ul>
                            @forelse ($category->products as $product) <!-- Use 'forelse' to handle empty product list -->
                                <li>{{ $product->product_name }}</li>
                            @empty
                                <li>No products available in this category.</li>
                            @endforelse
                        </ul>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
