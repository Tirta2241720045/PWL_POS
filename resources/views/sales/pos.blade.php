<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sales Point of Sale</title>
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

        main {
            padding: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
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
    </style>
</head>

<body>
    <header>
        <h1>PENJUALAN</h1>
    </header>
    <main>
        <p>This page displays the point of sale for sales transactions.</p>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Total Barang Terjual</th>
                    <th>Total Penjualan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2024-02-26</td>
                    <td>50</td>
                    <td>Rp. 5,000,000</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2024-02-27</td>
                    <td>60</td>
                    <td>Rp. 6,000,000</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>2024-02-28</td>
                    <td>55</td>
                    <td>Rp. 5,500,000</td>
                </tr>
            </tbody>
        </table>
        <ul>
            <li><a href="{{ url('/') }}">Kembali</a></li>
        </ul>
    </main>
    <footer>
        <p>&copy; {{ date('Y') }} POS_TI-2G_25_ROCHMEN</p>
    </footer>
</body>

</html>
