<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">

            <span class="ml-2 h4">My Website</span>
        </a>
        <a href="{{ route('logout') }}" class="btn btn-danger"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
         Logout
     </a>

     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    </nav>



    @php
  
    $storelist = App\Models\storelist::all();
@endphp
  
    <!-- Container -->
    <div class="container mt-5">
        <div class="row">
            @foreach ($storelist as $store)
            <div class="col-md-4 card text-center shadow-lg">
                    <div class="card-body">
                        <h1>{{ $store->store_name }}</h1>
                        <a href="{{ route('shop', ['shop' => $store->store_name]) }}" class="btn btn-primary">Click Now</a>
                    </div>
           
            </div>
        @endforeach
           
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
