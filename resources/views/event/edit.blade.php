<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard - Edit Event</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <br>
        <h1>Admin Dashboard - Edit Event</h1>
        <br>
        <form action="/event/edited/{{$lomba->idLomba}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="idLomba">ID Lomba:</label>
                <input type="text" class="form-control" id="idLomba" name="idLomba" value="{{ $lomba->idLomba }}" placeholder="ID lomba">
            </div>
            <div class="form-group">
                <label for="namaLomba">Nama Lomba:</label>
                <input type="text" class="form-control" id="namaLomba" name="namaLomba" value="{{ $lomba->namaLomba }}" placeholder="Nama lomba">
            </div>
            <div class="form-group">
                <label for="kategoriLomba">Kategori Lomba:</label>
                <input type="text" class="form-control" id="kategoriLomba" name="kategoriLomba" value="{{ $lomba->kategoriLomba }}" placeholder="Kategori">
            </div>
            <div class="form-group">
                <label for="kapasitas">Kapasitas:</label>
                <input type="text" class="form-control" id="kapasitas" name="kapasitas" value="{{ $lomba->kapasitas }}" placeholder="Kapasitas">
            </div>
            <div class="form-group">
                <label for="batasPendaftaran">Batas Pendaftaran:</label>
                <input type="date" class="form-control" id="batasPendaftaran" name="batasPendaftaran" value="{{ $lomba->batasPendaftaran }}" placeholder="Batas pendaftaran">
            </div>
            <div class="form-group">
                <label for="penyelenggara">Penyelenggara:</label>
                <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" value="{{ $lomba->penyelenggara }}" placeholder="Penyelenggara">
            </div>
            <div class="form-group">
                <label for="biaya">Biaya:</label>
                <input type="text" class="form-control" id="biaya" name="biaya" value="{{ $lomba->biaya }}" placeholder="Biaya">
            </div>            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>