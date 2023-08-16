<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}
.button {
  background-color: #199319;
  color: white;
  padding: 15px 25px;
  text-decoration: none;
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
<div class="topnav">
  <a class="active" href="transaksi.php">Transaksi</a>
  <a href="read.php">Daftar Makanan</a>
</div>

<div style="padding-left:16px">
<h1>Daftar Transaksi</h1>
    <a href="read.php" class="button">Tambah Order</a>
    <br>
    <br>
    <table border="1" id="customers">
        <tr>
            
            <th>Nama Pelanggan</th>
            <th>Nama Makanan</th>
            <th>Harga</th>
            <th>QTY</th>
            <th>Total Order</th>
        </tr>
        <?php
        include_once "func.php";
        $file_json = file_get_contents("order.json");
        $data_order = json_decode($file_json, true);

        $no = 1;
        foreach ($data_order as $key => $value) {
            # code...
        ?>

        <tr>
            
            <td><?= $value["nama"] ?></td>
            <td><?= $value["nama_makanan"] ?></td>
            <td><?= $value["harga"] ?></td>
            <td><?= $value["qty"] ?></td>
            <td><?= hitung($value["qty"], $value["harga"], "kali") ?></td>
        </tr>
        <?php
        $no++;
        }
        ?>
        
    </table>
</div>
    
    
</body>
</html>