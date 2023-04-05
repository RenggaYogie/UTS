<?php 
    include ('Koneksi.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Driver</title>
</head>
<body>
    <h2>Data Driver</h2>
    <a href="InputDriver.php" type="button">
        <i class="fa-solid fa-plus"></i>
        Tambah Data
    </a>
    <table border="1">
        <thead>
            <tr>
                <th>ID Driver</th>
                <th>Nama</th>
                <th>NO.SIM</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                 //proses menampilkan data dari database:
                 //siapkan query SQL
                 $query = "SELECT * FROM driver";
                 $result = mysqli_query($conn,$query);
            ?>
            <?php while($data = mysqli_fetch_array($result)): ?>
                <tr>
                    <td><?php echo $data['id_driver']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['no_sim']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td>
                    <a href="<?php echo "UpdateDriver.php?id_driver=".$data['id_driver']; ?>"> Update</a>
                    &nbsp;&nbsp;
                    <a href="<?php echo "DeleteDriver.php?id_driver=".$data['id_driver']; ?>" > Delete</a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</body>
</html>