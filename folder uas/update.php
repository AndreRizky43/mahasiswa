<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<body>
<?php

    include "koneksi.php";

    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if (isset($_GET['id_mahasiswa'])) {
        $id_mahasiswa=input($_GET["id_mahasiswa"]);
        
        $sql="select * from mahasiswa where id_mahasiswa='$id_mahasiswa'";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);
        
        

    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_mahasiswa=htmlspecialchars($_POST["id_mahasiswa"]);
        $nama=input($_POST["nama"]);
        $sekolah=input($_POST["sekolah"]);
        $jurusan=input($_POST["jurusan"]);
        $semester=input($_POST["semester"]);
        

        $sql="update mahasiswa set nama = '$nama',sekolah = '$sekolah',jurusan = '$jurusan',semester = '$semester' where id_mahasiswa = '$id_mahasiswa'";

        
        mysqli_query($kon, $sql);
if(mysqli_affected_rows($kon) > 0) {
    header("Location:index.php");
} else {
    echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
}
    }

    ?>
    <h2>Update Data</h2>


    <form action="" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required value='<?= $data['nama'] ?>'/>

        </div>
        <div class="form-group">
            <label>Sekolah:</label>
            <input type="text" name="sekolah" class="form-control" placeholder="Masukan Nama Sekolah" required value='<?= $data['sekolah'] ?>'/>
        </div>
        <div class="form-group">
            <label>Jurusan :</label>
            <input type="text" name="jurusan" class="form-control" placeholder="Masukan Jurusan" required value='<?= $data['jurusan'] ?>'/>
        </div>
        <div class="form-group">
            <label>Semester</label>
            <input type="text" name="semester" class="form-control" placeholder="Masukan Semester" required value='<?= $data['semester'] ?>'/>
        </div>
        

        <input type="hidden" name="id_mahasiswa" value="<?= $data['id_mahasiswa']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>