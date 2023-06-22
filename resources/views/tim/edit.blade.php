<!DOCTYPE html>
<html>

<head>
    <title>Edit Anggota Tim</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        @foreach($tims as $tim)
        <h1>Edit Tim {{ $tim->namaTim }}</h1>
        @endforeach
        <h4>Silakan edit data tim Anda!</h4>

        <div class="row mt-3">
            <div class="col">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <form action="/update-member" method="POST">
                    @csrf
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Id Pengguna</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <input type="text" name="nama" value="John Doe">
                                </td>
                                <td>
                                    <input type="text" name="id" value="123456">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <a href="#" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</body>

</html>