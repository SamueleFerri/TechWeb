<!DOCTYPE html>
<html>  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <h1>ADMIN</h1>

    <!-- Authentication -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <input type="submit" value="Logout">
    </form>
</body>
</html>