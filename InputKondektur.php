<?php 
    include ('Koneksi.php'); 

    $status = '';
    //melakukan pengecekan apakah ada form yang dipost
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_kondektur = $_POST['id_kondektur'];
        $nama = $_POST['nama'];

        $query = "INSERT INTO kondektur (id_kondektur, nama) VALUES('$id_kondektur','$nama')"; 

        //eksekusi query
        $result = mysqli_query($conn,$query);
        if ($result) {
          $status = 'ok';
        } else{
          $status = 'err';
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Input Kondektur</title>
</head>
<body>
    <?php 
        if ($status=='ok') {
          echo '<br><br><div class="alert alert-success" role="alert">Data Kondektur berhasil disimpan</div>';
        }
        elseif($status=='err'){
          echo '<br><br><div class="alert alert-danger" role="alert">Data Kondektur gagal disimpan</div>';
        }
    ?>
    <h2>Form Kondektur</h2>
    <form action="InputKondektur.php" method="POST">
        <table>
            <tr>
                <td><label>ID Kondektur</label></td>
                <td><input type="text" placeholder="ID Kondektur" name="id_kondektur" required="required"></td>
            </tr>
            <tr>
                <td><label>Nama</label></td>
                <td><input type="text" class="form-control" placeholder="nama" name="nama" required="required"></td>
            </tr>
        </table><br>
        <button type="submit">Tambahkan</button>
        <a href="DataKondektur.php" type="button">
            <i class="fa-solid fa-reply"></i>
            Kembali
        </a>
    </form>
</body>
</html>