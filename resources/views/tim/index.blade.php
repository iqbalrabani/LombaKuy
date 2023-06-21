<!DOCTYPE html>
<html>
<head>
    <title>Daftar Tim Lomba</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <br>
        <h1>LombaKuy!</h1>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Tim</th>
                    <th>Nama Tim</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tims as $key => $tim)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $tim->idTim }}</td>
                    <td>{{ $tim->namaTim }}</td>
                    <td>
                        <button type='button' class='btn btn-primary'>Detail</button>
                    </td>
                </tr>
                @endforeach
                @if ($tims->isEmpty())
                <tr>
                    <td colspan="4">Tidak ada tim yang tersedia.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
