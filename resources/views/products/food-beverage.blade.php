<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Food and Beverage Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            color: #333;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin: 0 10px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #555;
        }

        main {
            padding: 20px;
            text-align: center;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 10px;
        }

        ul li a {
            background-color: #333;
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        ul li a:hover {
            background-color: #555;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
        <h1>PRODUCTS</h1>
        <nav>
            <ul>
                <li><a href="{{ url('category/food-beverage') }}">Food & Beverage</a></li>
                <li><a href="{{ url('category/beauty-health') }}">Beauty & Health</a></li>
                <li><a href="{{ url('category/home-care') }}">Home Care</a></li>
                <li><a href="{{ url('category/baby-kid') }}">Baby & Kid</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <p>This page displays food and beverage products.</p>
        <ul>
            <li><a href="{{ url('/') }}">Kembali</a></li>
        </ul>
    </main>
    <footer>
        <p>&copy; {{ date('Y') }} POS_TI-2G_25_ROCHMEN</p>
    </footer>
</body>

</html>
