<?php 
    include ('Koneksi.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .hijau{
            background-color: green;
        }
        .kuning {
            background-color : yellow;
        }
        .merah{
            background-color : red;
        }
    </style>
    <title>Data Bus</title>
</head>
<body>
    <h2>Data Bus</h2>
    <a href="InputBus.php" type="button">
        <i class="fa-solid fa-plus"></i>
        Tambah Data
    </a>
    <form method = "GET">
        <label for="status"><br>Filter berdasarkan status : </label>
        <select class="select_filter" id="status_id" name="status" required>
            <option value="all">-- Pilih status --</option>
            <option value="1" <?php if (isset($_GET['status']) && $_GET['status'] == 1) {
                echo " selected";
            } ?>>
                Beroperasi / Aktif</option>
            <option value="2" <?php if (isset($_GET['status']) && $_GET['status'] == 2) {
                echo " selected";
            } ?>>
                Cadangan</option>
            <option value="0" <?php if (isset($_GET['status']) && $_GET['status'] == 0) {
                echo " selected";
            } ?>>
                Dalam Perbaikan / Rusak</option>
        </select>
        <input type="submit" value="Filter">
    </form>
        <table border="1">
            <thead>
                <tr>
                    <th>ID Bus</th>
                    <th>Plat</th>
                    <th>Status</th>
                    <th>Jumlah KM</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                //proses menampilkan data dari database:
                //siapkan query SQL
                if (isset($_GET['status'])) {
                    $status = $_GET['status'];
                    // $query = "SELECT * FROM bus WHERE status = $status";
                    $query = "select bus.id_bus,bus.plat,bus.status,trans_upn.jumlah_km from bus join trans_upn on bus.id_bus = trans_upn.id_trans_upn WHERE status = '$status'";
                } else {
                    // $query = "SELECT * FROM bus";
                    $query = "select bus.id_bus,bus.plat,bus.status,trans_upn.jumlah_km from bus join trans_upn on bus.id_bus = trans_upn.id_trans_upn";
                }
                $result = mysqli_query($conn, $query);
            ?>
            <?php while($data = mysqli_fetch_array($result)): ?>
                <tr class="<?php echo $data['status'] == '1' ? 'hijau' : ($data['status'] == '2' ? 'kuning' : 'merah'); ?>">
                    <td><?php echo $data['id_bus'];  ?></td>
                    <td><?php echo $data['plat'];  ?></td>
                    <td><?php echo $data['status'];  ?></td>
                    <td><?php echo $data['jumlah_km'];  ?></td>
                    <td>
                        <a href="<?php echo "UpdateBus.php?id_bus=".$data['id_bus']; ?>">Update</a>
                        &nbsp;&nbsp;
                        <a href="<?php echo "DeleteBus.php?id_bus=".$data['id_bus']; ?>"> Delete</a>
                    </td>
                </tr>
            <?php endwhile ?>
            </tbody>
        </table>
    </div>
</body>
</html>