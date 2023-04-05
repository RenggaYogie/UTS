<?php 
    include ('Koneksi.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Trans UPN</title>
</head>
<body>
    <h2>Data TransUPN</h2>
    <a href="InputTransUPN.php" type="button">
        <i class="fa-solid fa-plus"></i>
        Tambah Data
    </a>
    <table border="1">
        <thead>
            <tr>
                <th>ID Trans UPN</th>
                <th>ID Kondektur</th>
                <th>ID Bus</th>
                <th>ID Driver</th>
                <th>Jumlah_KM</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            //proses menampilkan data dari database:
            //siapkan query SQL
            $query = "SELECT * FROM trans_upn";
            $result = mysqli_query($conn,$query);
        ?>
        <?php
            while($data = mysqli_fetch_array($result)):
        ?>
        <tr>
            <td><?php echo $data['id_trans_upn'];  ?></td>
            <td><?php echo $data['id_kondektur'];  ?></td>
            <td><?php echo $data['id_bus'];  ?></td>
            <td><?php echo $data['id_driver'];  ?></td>
            <td><?php echo $data['jumlah_km'];  ?></td>
            <td><?php echo $data['tanggal'];  ?></td>
            <td>
                <a href="<?php echo "UpdateTransUPN.php?id_trans_upn=".$data['id_trans_upn']; ?>"> Update</a>
                &nbsp;&nbsp;
                <a href="<?php echo "DeleteTransUPN.php?id_trans_upn=".$data['id_trans_upn']; ?>"> Delete</a>
            </td>
        </tr>
        <?php
            endwhile
        ?>
        </tbody>
    </table>
</body>
</html>