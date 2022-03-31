<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>@yield('pagetitle')</title>
</head>
<body>
    <div>
        <nav  class="nav navbar fixed-top navbar-expand-lg bg-dark">
            <div style="color: antiquewhite; padding-top:'3rem'" class="container">
                <div style="color: aliceblue" class="navbar-brand">
                    SOUQ-ALSIRAJ
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <span style="color: bisque" class="navbar-toggler-icon">+++</span>
                </button>
                <div style="color: antiquewhite" class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('product.index') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('brand.index') }}">Brands</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('client.index') }}">Clients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('invoice.index') }}">Purchases</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sinvoice.index') }}">Sales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('receiptin.index') }}">Income</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('receiptout.index') }}">Payments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('balance') }}">Balance</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div style="padding-top: 5rem" class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>