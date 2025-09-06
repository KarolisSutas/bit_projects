<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Task List App</title>
    @yield('styles')
    <style>
            a {
        display: inline-block;
        padding: 0.5rem 1rem;
        margin: 0.3rem 0;
        color: white;
        background-color: #4b3ea2d4;
        text-decoration: none;
        border-radius: 6px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    a:hover {
        background-color: #1e3799;
        transform: translateY(-2px);
    }

    a:active {
        background-color: #3c6382;
        transform: translateY(0);
    }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background: linear-gradient(45deg , #792b87, #49a764, #c24518);
            color: white;
            padding: 1rem;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        h1 {
            margin: 0;
            font-size: 2rem;
        }

        .container {
            max-width: 800px;
            margin: 2rem auto;
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .task-form {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

    .form-group {
        margin-bottom: 1.5rem;
}

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 0.5rem;
        color: #333;
}

    input[type="text"],
    textarea {
        width: 100%;
        padding: 0.7rem;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
}

    input[type="text"]:focus,
    textarea:focus {
        border-color: #4a69bd;
        outline: none;
}

    .form-actions {
        text-align: right;
}

    button {
        background: linear-gradient(45deg , #792b87, #49a764, #c24518);
        color: white;
        padding: 0.7rem 1.5rem;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 1rem;
        transition: background-color 0.3s ease, transform 0.2s ease;
}

    button:hover {
        background: linear-gradient(45deg , #5a2164, #327344, #8d3211);
        transform: translateY(-1px);
}


    </style>
</head>
<body>
    <header>
        <h1>@yield('title')</h1>
    </header>

    <div class="container">
        @if (session()->has('success'))
            <div>{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
</body>
</html>
