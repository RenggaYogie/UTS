<?php 
    include ('Koneksi.php'); 
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_bus = $_POST['id_bus'];
        $plat = $_POST['plat'];
        $status = $_POST['status'];
        //query SQL
        $query = "INSERT INTO bus (id_bus, plat, status) VALUES('$id_bus','$plat','$status')"; 

        //eksekusi query
        $result = mysqli_query($conn,$query);
        if($result){
          echo "Data Berhasil DiTambahkan <a href='DataBus.php'>[Home]</a>";
        } else {
          echo "Data Gagal DiTambahkan";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Input Bus</title>
    </head>
<body>
    <h2>Form Bus</h2>
    <form action="InputBus.php" method="POST">
        <table>
            <tr>
                <td><label>ID bus</label></td>
                <td><input type="text" class="form-control" placeholder="ID Bus" name="id_bus" required="required"></td>
            </tr>
            <tr>
                <td><label>Plat</label></td>
                <td><input type="text" class="form-control" placeholder="Plat" name="plat" required="required"></td>
            </tr>
            <tr>
                <td><label>Status</label></td>
                <td><input type="text" class="form-control" placeholder="Status" name="status" required="required"></td>
            </tr>
        </table>
        <button type="submit">Tambahkan</button>
        <a href="DataBus.php" type="button" class="merah">
            <i class="fa-solid fa-reply"></i>
            Kembali
        </a>
    </form>
</body>
</html>