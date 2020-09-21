<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
    <form id="formLogin">
        <label for="">Email</label>
        <input type="email" id="email" name="email"><br>
        <label for="">Password</label>
        <input type="password" id="password" name="password"><br>
        <button type="submit" id="btnLogin">Login</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>