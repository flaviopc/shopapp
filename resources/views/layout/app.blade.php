<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ShopApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">ShopApp</a>
            </div>
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownProduct"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Produtos
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownProduct">
                    <li><a class="dropdown-item" href="{{route('products.create')}}">Novo</a></li>
                    <li><a class="dropdown-item" href="{{route('products.index')}}">Exibir todos</a></li>
                </ul>
            </div>

            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownTag"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Tags
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownTag">
                    <li><a class="dropdown-item" href="{{route('tags.create')}}">Nova</a></li>
                    <li><a class="dropdown-item" href="{{route('tags.index')}}">Exibir todas</a></li>
                </ul>
            </div>
        </nav>
        @yield('content')
    </div>
</body>

</html>
