<?php
    include ('Koneksi.php');

    $status = '';
    $result = '';
    //melakukan pengecekan apakah ada variable GET yang dikirim
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id_kondektur'])) {
            //query SQL
            $id_kondektur_upd = $_GET['id_kondektur'];
            $query = "SELECT * FROM kondektur WHERE id_kondektur = '$id_kondektur_upd'";

            //eksekusi query
            $result = mysqli_query($conn,$query);
        }
    }

    //melakukan pengecekan apakah ada form yang dipost
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_kondektur = $_POST['id_kondektur'];
        $nama = $_POST['nama'];
        //query SQL
        $sql = "UPDATE kondektur SET nama='$nama' WHERE id_kondektur='$id_kondektur'";

        //eksekusi query
        $result = mysqli_query($conn,$sql);
        if ($result) {
          $status = 'ok';
        } else{
          $status = 'err';
        }

        //redirect ke halaman lain
        header('Location: DataKondektur.php?status='.$status);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Update Kondektur</title>
</head>
<body>
    <h2>Update Data Kondektur</h2>
    <form action="UpdateKondektur.php" method="POST">
    <?php
        while($data = mysqli_fetch_array($result)):
    ?>
    <table>
        <tr>
            <td><label>ID Kondektur</label></td>
            <td><input type="text" placeholder="id_kondektur" name="id_kondektur" value="<?php echo $data['id_kondektur']; ?>" required="required"></td>
        </tr>
        <tr>
            <td><label>Nama</label></td>
            <td><input type="text" placeholder="nama" name="nama" value="<?php echo $data['nama']; ?>" required="required"></td>
        </tr>
    </table><br>
    <?php
        endwhile;
    ?>
    <button type="submit">Simpan Perubahan</button>
    <a href="DataKondektur.php" type="button">
        <i class="fa-solid fa-reply"></i>
        Kembali
    </a>
    </form>
</body>
</html>