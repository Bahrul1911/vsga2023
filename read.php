<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Makanan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="topnav">
  <a  href="transaksi.php">Transaksi</a>
  <a class="active" href="read.php">Daftar Makanan</a>
</div>

<div style="padding-left:16px">
<br>
<br>
<a href="add.php" class="button">Tambah Makanan</a>
<br>
<br>
    <h1>Daftar Menu</h1>
    <br>
    <br>
    <table border="1" id="customers">
        <tr>
            <th>No</th>
            <th>Makanan</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Order</th>
        </tr>
        <?php
         $file_json = file_get_contents('dbmakanan.json');
         $data_makanan = json_decode($file_json, true);

        $no = 1;
        foreach ($data_makanan as $key => $value) {
            # code...
            ?>

            <tr>
            <td><?= $no ?></td>
            <td><?= $value ["nama_makanan"] ?></td>
            <td><?= $value ["satuan"] ?></td>
            <td><?= $value ["harga"] ?></td>
            <td><a style="background-color: #199319;color: white;padding: 5px 15px; 
            text-decoration: none;" href="order.php?nm=<?= $value["nama_makanan"] ?>&hrg=<?= $value["harga"] ?>&sat=<?= $value["satuan"] ?>">Order</a></td>
        </tr>

        <?php 
        $no++;
        }
        
        
        ?>

       
    </table>
</div>
</body>
</html>