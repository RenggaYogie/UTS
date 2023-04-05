<?php
    include ('Koneksi.php');

    //melakukan pengecekan apakah ada variable GET yang dikirim
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id_driver'])) {
            //query SQL
            $id_driver_upd = $_GET['id_driver'];
            $query = "SELECT * FROM driver WHERE id_driver = '$id_driver_upd'";

            //eksekusi query
            $result = mysqli_query($conn,$query);
        }
    }

    //melakukan pengecekan apakah ada form yang dipost
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_driver = $_POST['id_driver'];
        $nama = $_POST['nama'];
        $no_sim = $_POST['no_sim'];
        $alamat = $_POST['alamat'];
        //query SQL
        $sql = "UPDATE driver SET nama='$nama', no_sim='$no_sim', alamat='$alamat'  WHERE id_driver='$id_driver'";

        //eksekusi query
        $result = mysqli_query($conn,$sql);
        if ($result) {
          $status = 'ok';
        }
        else{
          $status = 'err';
        }

        //redirect ke halaman lain
        header('Location: DataDriver.php?status='.$status);
    }
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css">
  <title>Update Driver</title>
</head>
<body>
    <h2>Update Data Driver</h2>
    <form action="updateDriver.php" method="POST">
    <?php
        while($data = mysqli_fetch_array($result)): 
    ?>
    <table>
        <tr>
            <td><label>ID Driver</label></td>
            <td><input type="text" placeholder="id_driver" name="id_driver" value="<?php echo $data['id_driver'];  ?>" required="required" readonly></td>
        </tr>
        <tr>
            <td><label>Nama</label></td>
            <td><input type="text" placeholder="nama" name="nama" value="<?php echo $data['nama'];  ?>" required="required"></td>
        </tr>
        <tr>
            <td><label>No.SIM</label></td>
            <td><input type="text" placeholder="no_sim" name="no_sim" value="<?php echo $data['no_sim'];  ?>" required="required"></td>
        </tr>
        <tr>
            <td><label>Alamat</label></td>
            <td><input type="text" placeholder="alamat" name="alamat" value="<?php echo $data['alamat'];  ?>" required="required"></td>
        </tr>
    </table>
    <?php
        endwhile;
    ?>
    <button type="submit">Simpan Perubahan</button>
    <a href="DataDriver.php" type="button">
        <i class="fa-solid fa-reply"></i>
        Kembali
    </a>
    </form>
</body>
</html>