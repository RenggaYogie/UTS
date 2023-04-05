<?php 
    include ('Koneksi.php'); 

    $status = '';
    //melakukan pengecekan apakah ada form yang dipost
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_driver = $_POST['id_driver'];
        $nama = $_POST['nama'];
        $no_sim = $_POST['no_sim'];
        $alamat = $_POST['alamat'];
        //query SQL
        $query = "INSERT INTO driver (id_driver, nama, no_sim, alamat) VALUES('$id_driver','$nama','$no_sim','$alamat')"; 

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
      <title>Input Driver</title>
    </head>
    <body>
        <?php 
            if ($status=='ok') {
              echo '<br><br><div class="alert alert-success" role="alert">Data Driver berhasil disimpan</div>';
            }
            elseif($status=='err'){
              echo '<br><br><div class="alert alert-danger" role="alert">Data Driver gagal disimpan</div>';
            }
        ?>
        <h2>Form Driver</h2>
        <form action="InputDriver.php" method="POST">
            <table>
                <tr>
                    <td><label>ID Driver</label></td>
                    <td><input type="text" placeholder="ID Driver" name="id_driver" required="required"></td>
                </tr>
                <tr>
                    <td><label>Nama</label></td>
                    <td><input type="text" placeholder="nama" name="nama" required="required"></td>
                </tr>
                <tr>
                    <td><label>No.SIM</label></td>
                    <td><input type="text" placeholder="no_sim" name="no_sim" required="required"></td>
                </tr>
                <tr>
                    <td><label>Alamat</label></td>
                    <td><input type="text" placeholder="alamat" name="alamat" required="required"></td>
                </tr>
            </table><br>
            <button type="submit">Tambahkan</button>
            <a href="DataDriver.php" type="button">
                <i class="fa-solid fa-reply"></i>
                Kembali
            </a>
        </form>
    </body>
</html>