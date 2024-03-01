<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Profile</title>
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
        <h1>USER</h1>
    </header>
    <main>
        <p>This page displays User Profile.</p>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Yanto</td>
                    <td>Admin</td>
                    <td>Active</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Siti</td>
                    <td>User</td>
                    <td>Active</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Tirta</td>
                    <td>User</td>
                    <td>Non-Actived</td>
                </tr>
                <tr>
                    <td>{{ $id }}</td>
                    <td>{{ $name }}</td>
                    <td>User</td>
                    <td>Active</td>
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
