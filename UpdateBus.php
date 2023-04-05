<?php
    include ('Koneksi.php');
    //melakukan pengecekan apakah ada variable GET yang dikirim
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id_bus'])) {
            //query SQL
            $id_bus_upd = $_GET['id_bus'];
            $query = "SELECT * FROM bus WHERE id_bus = '$id_bus_upd'";

            //eksekusi query
            $result = mysqli_query($conn,$query);
        }
    }
    //melakukan pengecekan apakah ada form yang dipost
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_bus = $_POST['id_bus'];
        $plat = $_POST['plat'];
        $status = $_POST['status'];
        //query SQL
        $sql = "UPDATE bus SET plat='$plat', status='$status' WHERE id_bus='$id_bus'";

        //eksekusi query
        $result = mysqli_query($conn,$sql);
        if($result){
          $status = "Berhasil DiUpdate <a href='DataBus.php'>[Home]</a>";
        } else {
          $status = "Data Gagal DiUpdate";
        }
        
        header("location:DataBus.php?status".$status);
    }
?>  

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Update Bus</title>
</head>
<body>
    <h2>Update Data Bus</h2>
    <form action="UpdateBus.php" method="POST">
    <?php 
        while($data = mysqli_fetch_array($result)):
    ?>
    <table>
        <tr>
            <td><label>id_bus</label></td>
            <td><input type="text" placeholder="id_bus" name="id_bus" value="<?php echo $data['id_bus'];  ?>" required="required" readonly></td>
        </tr>
        <tr>
            <td><label>Plat</label></td>
            <td><input type="text" placeholder="Plat" name="plat" value="<?php echo $data['plat'];  ?>" required="required"></td>
        </tr>
        <tr>
            <td><label>Status</label></td>
            <td><input type="text" placeholder="status" name="status" value="<?php echo $data['status'];  ?>" required="required"></td>
        </tr>
    </table>
    <?php
        endwhile;
    ?>
    <button type="submit">Simpan</button>
    <a href="DataBus.php" type="button" class="merah">
        <i class="fa-solid fa-reply"></i>
        Kembali
    </a>
    </form>
</body>
</html>