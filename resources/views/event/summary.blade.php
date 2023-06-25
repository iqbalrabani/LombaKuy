<!DOCTYPE html>
<html>

<head>
    <title>Ringkasan Lomba</title>
</head>

<body>
    <h2>Ringkasan Lomba</h2>
    <p>ID: {{ $lomba->idLomba }}</p>
    <p>Nama Lomba: {{ $lomba->namaLomba }}</p>
    <p>Kategori Lomba: {{ $lomba->kategoriLomba }}</p>
    <p>Kapasitas: {{ $lomba->kapasitas }}</p>
    <p>Batas Pendaftaran: {{ $lomba->batasPendaftaran }}</p>
    <p>Penyelenggara: {{ $lomba->penyelenggara }}</p>
    <p>Biaya: {{ $lomba->biaya }}</p>

    <a href="{{ route('lombas.index') }}">Kembali ke Daftar Lomba</a>
</body>

</html>