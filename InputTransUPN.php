<?php 
    include ('Koneksi.php'); 

    $status = '';
    //melakukan pengecekan apakah ada form yang dipost
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_trans_upn = $_POST['id_trans_upn'];
        $id_kondektur = $_POST['id_kondektur'];
        $id_bus = $_POST['id_bus'];
        $id_driver = $_POST['id_driver'];
        $jumlah_km = $_POST['jumlah_km'];
        $tanggal = $_POST['tanggal'];
        //query SQL
        $query = "INSERT INTO trans_upn (id_trans_upn, id_kondektur, id_bus, id_driver, jumlah_km, tanggal) VALUES('$id_trans_upn', '$id_kondektur', '$id_bus','$id_driver','$jumlah_km','$tanggal')"; 

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
  <title>Input Trans UPN</title>
</head>
<body>
    <?php 
        if ($status=='ok') {
          echo '<br><br><div class="alert alert-success" role="alert">Data Trans UPN berhasil disimpan</div>';
        }
        elseif($status=='err'){
          echo '<br><br><div class="alert alert-danger" role="alert">Data Trans UPN gagal disimpan</div>';
        }
     ?>
    <h2>Form Transupn</h2>
    <form action="InputTransUPN.php" method="POST">
        <table>
            <tr>
                <td><label>ID Trans UPN</label></td>
                <td><input type="text" placeholder="ID Trans UPN" name="id_trans_upn" required="required"></td>
            </tr>
            <tr>
                <td><label>ID Kondektur</label></td>
                <td><input type="text" placeholder="ID Kondektur" name="id_kondektur" required="required"></td>
            </tr>
            <tr>
                <td><label>ID Bus</label></td>
                <td><input type="text" placeholder="ID Bus" name="id_bus" required="required"></td>
            </tr>
            <tr>
                <td><label>ID Driver</label></td>
                <td><input type="text" placeholder="ID Driver" name="id_driver" required="required"></td>
            </tr>
            <tr>
                <td><label>Jumlah KM</label></td>
                <td><input type="text" placeholder="jumlah_km" name="jumlah_km" required="required"></td>
            </tr>
            <tr>
                <td><label>Tanggal</label></td>
                <td><input type="text" placeholder="2023-10-18" name="tanggal" required="required"></td>
            </tr>
        </table>
        <button type="submit">Tambahkan</button>
        <a href="DataTransUPN.php" type="button">
            <i class="fa-solid fa-reply"></i>
            Kembali
        </a>
        </form>
</body>
</html>