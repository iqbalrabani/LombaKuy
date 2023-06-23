<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    @if ($errors->has('email'))
    <div class="alert alert-danger">
        {{ $errors->first('email') }}
    </div>
@endif

@if ($errors->has('succes'))
<div class="alert alert-succes">
    {{ $errors->first('succes') }}
</div>
@endif 
    <div class="container">
        <div class="w-50 mx-auto border rounded px-3 py-3 mt-5">
            <h1 class="text-center">Login</h1>
            <form action="/sesi/login" method="POST">
                @csrf
                <div class="form-group">
                    <label for="idPengguna">Id Pengguna</label>
                    <input type="text" value="{{ Session::get('idPengguna') }}" name="idPengguna" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button name="submit" type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
        <br>
        <div class="text-center">
            Belum memiliki akun?
            <a href="/sesi/register">Register</a>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>







