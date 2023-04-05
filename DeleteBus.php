<?php 
    include ('Koneksi.php'); 
    //melakukan pengecekan apakah ada form yang dipost
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id_bus'])) {
            //query SQL
            $id_bus_upd = $_GET['id_bus'];
            $query = "DELETE FROM bus WHERE id_bus = '$id_bus_upd'"; 
            //eksekusi query
            $result = mysqli_query($conn,$query);
            if($result){
              echo "Data Berhasil DiHapus <a href='DataBus.php'>[Home]</a>";
            } else {
              echo "Data Gagal Dihapus";
            }
        }  
    }
?>