<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Tambah Siswa</h2>
    <hr>
    <form action="/siswa/{{ $siswa ['id']}}" method="post">
        @method('PUT')
        @csrf
       <select name="kelas" id="">
        <option>Pilih Kelas</option>
        <option value="xi rpl 1"{{$siswa['kelas'] == 'xi rpl 1' ? 'selected' : ''}}>xi rpl 1</option>
        <option value="xi rpl 2"{{$siswa['kelas'] == 'xi rpl 2' ? 'selected' : ''}}>xi rpl 2</option>
        <option value="xi rpl 3"{{$siswa['kelas'] == 'xi rpl 3' ? 'selected' : ''}}>xi rpl 3</option>
       </select>
    <br>
    <input type="text" name="nama" value="{{$siswa['nama']}}" required>
    <br>

    <button type="submit">Simpan</button>
        <button type="submit">Reset</button>
    </form>
</body>
</html>