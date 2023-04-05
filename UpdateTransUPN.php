<?php
    include ('Koneksi.php');

    $status = '';
    $result = '';
    //melakukan pengecekan apakah ada variable GET yang dikirim
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id_trans_upn'])) {
            //query SQL
            $id_trans_upn_upd = $_GET['id_trans_upn'];
            $query = "SELECT * FROM trans_upn WHERE id_trans_upn = '$id_trans_upn_upd'";

            //eksekusi query
            $result = mysqli_query($conn,$query);
        }
    }

    //melakukan pengecekan apakah ada form yang dipost
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_trans_upn = $_POST['id_trans_upn'];
        $id_kondektur = $_POST['id_kondektur'];
        $id_bus = $_POST['id_bus'];
        $id_driver = $_POST['id_driver'];
        $jumlah_km = $_POST['jumlah_km'];
        $tanggal = $_POST['tanggal'];

        //query SQL
        $sql = "UPDATE trans_upn SET id_kondektur='$id_kondektur', id_bus='$id_bus', id_driver='$id_driver' , jumlah_km='$jumlah_km', tanggal='$tanggal'  WHERE id_driver='$id_driver'";

        //eksekusi query
        $result = mysqli_query($conn,$sql);
        if ($result) {
          $status = 'ok';
        } else{
          $status = 'err';
        }

        //redirect ke halaman lain
        header('Location: DataTransUPN.php?status='.$status);
    }
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css">
  <title>Update Trans UPN</title>
</head>
<body>
    <h2>Update Data Trans UPN</h2>
    <form action="UpdateTransupn.php" method="POST">
    <?php
        while($data = mysqli_fetch_array($result)): 
    ?>
    <table>
        <tr>
            <td><label>ID Trans UPN</label></td>
            <td><input type="text" placeholder="id_trans_upn" name="id_trans_upn" value="<?php echo $data['id_trans_upn']; ?>" required="required"></td>
        </tr>
        <tr>
            <td><label>ID Kondektur</label></td>
            <td><input type="text" placeholder="id_kondektur" name="id_kondektur" value="<?php echo $data['id_kondektur']; ?>" required="required"></td>
        </tr>
        <tr>
            <td><label>ID Bus</label></td>
            <td><input type="text" placeholder="id_bus" name="id_bus" value="<?php echo $data['id_bus']; ?>" required="required"></td>
        </tr>
        <tr>
            <td><label>ID Driver</label></td>
            <td><input type="text" placeholder="id_driver" name="id_driver" value="<?php echo $data['id_driver']; ?>" required="required"></td>
        </tr>
        <tr>
            <td><label>Jumlah_KM</label></td>
            <td><input type="text" placeholder="jumlah_km" name="jumlah_km" value="<?php echo $data['jumlah_km']; ?>" required="required"></td>
        </tr>
        <tr>
            <td><label>Tanggal</label></td>
            <td><input type="text" placeholder="tanggal" name="tanggal" value="<?php echo $data['tanggal']; ?>" required="required"></td>
        </tr>
    </table>
    <?php
        endwhile;
    ?>
    <button type="submit">Simpan Perubahan</button>
    <a href="DataTransUPN.php" type="button">
        <i class="fa-solid fa-reply"></i>
        Kembali
    </a>
    </form>
</body>
</html>