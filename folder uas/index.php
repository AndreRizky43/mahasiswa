<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">UNIVERSITAS ISLAM BALITAR</span>
        </div>
    </nav>
    <div class="container">
        <br>
        <h4>
            <center>DAFTAR MAHASISWA</center>
        </h4>
        <?php

        include "koneksi.php";

        if (isset($_GET['id_mahasiswa'])) {
            $id_mahasiswa = htmlspecialchars($_GET["id_mahasiswa"]);

            $sql = "delete from mahasiswa where id_mahasiswa='$id_mahasiswa' ";
            $hasil = mysqli_query($kon, $sql);

            if ($hasil) {
                header("Location:index.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
            }
        }
        ?>


        <tr class="table-danger">
            <br>
            <thead>
                <tr>
                    <table class="my-3 table table-bordered">
                        <tr class="table-primary">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Sekolah</th>
                            <th>Jurusan</th>
                            <th>Semester</th>
                    
                            <th colspan='2'>Aksi</th>

                        </tr>
            </thead>

            <?php
            include "koneksi.php";
            $sql = "select * from mahasiswa order by id_mahasiswa desc";

            $hasil = mysqli_query($kon, $sql);
            $no = 0;
            while ($data = mysqli_fetch_array($hasil)) {
                $no++;

            ?>
                <tbody>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data["nama"]; ?></td>
                        <td><?php echo $data["sekolah"];   ?></td>
                        <td><?php echo $data["jurusan"];   ?></td>
                        <td><?php echo $data["semester"];   ?></td>
                        
                        <td>
                            <a href="update.php?id_mahasiswa=<?php echo htmlspecialchars($data['id_mahasiswa']); ?>" class="btn btn-warning" role="button">Update</a>
                            <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id_mahasiswa=<?php echo $data['id_mahasiswa']; ?>" class="btn btn-danger" role="button">Delete</a>
                        </td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
            </table>
            <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
    </div>
    <script src="popup.js"></script>
</body>
</html>