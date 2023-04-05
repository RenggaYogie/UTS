<?php 
    include ('Koneksi.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kondektur</title>
</head>
<body>
    <h2>Data Kondektur</h2>
    <a href="InputKondektur.php" type="button">
        <i class="fa-solid fa-plus"></i>
        Tambah Data
    </a>
    <table border="1">
        <thead>
            <tr>
                <th>ID Kondektur</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                //proses menampilkan data dari database:
                //siapkan query SQL
                $query = "SELECT * FROM kondektur";
                $result = mysqli_query($conn,$query);
            ?>
            <?php
                while($data = mysqli_fetch_array($result)):
            ?>
            <tr>
                <td><?php echo $data['id_kondektur']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td>
                    <a href="<?php echo "UpdateKondektur.php?id_kondektur=".$data['id_kondektur']; ?>"> Update</a>
                    &nbsp;&nbsp;
                    <a href="<?php echo "DeleteKondektur.php?id_kondektur=".$data['id_kondektur']; ?>"> Delete</a>
                </td>
            </tr>
            <?php
                endwhile
            ?>
        </tbody>
    </table>
</body>
</html>