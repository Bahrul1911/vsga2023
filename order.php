<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Makanan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="order.php" method="post">
        <table id="customers">
            <tr>
                <th colspan="2">
                    Jumlah Order
                </th>
            </tr>
            <tr>
                <td>Nama Makanan</td>
                <td>: <?= $_GET["nm"]?></td>
                <input type="hidden" name="nama_makanan" value="<?= $_GET["nm"] ?>">
            </tr>
            <tr>
                <td>Satuan</td>
                <td>: <?= $_GET["sat"]?>
                <input type="hidden" name="satuan" value="<?= $_GET["sat"] ?>">
            </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>: <?= $_GET["hrg"]?>
                <input type="hidden" name="harga" value="<?= $_GET["hrg"] ?>">
            </td>
            </tr>
            <tr>
                <td>QTY</td>
                <td><input type="number" name="qty" id=""></td>
            </tr>
            <tr>
                <td>NamaPelanggan</td>
                <td><input type="text" name="nama" id=""></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" style="background-color: #199319;color: white;padding: 5px 15px; 
            text-decoration: none;">Order</button></td>
            </tr>
        </table>
    </form>

    <?php
    if(@($_POST)){
        $file_json = file_get_contents("order.json");
        $data_order = json_decode($file_json, true);

        foreach ($data_order as $key => $value) {
            # code...
            $_data_order[] = [
                "nama_makanan" => $value["nama_makanan"],
                "harga" => $value["harga"],
                "satuan" => $value["satuan"],
                "nama" => $value["nama"],
                "qty" =>$value["qty"]
            ];
        }
        $_data_order[] = [
            "nama_makanan" => $_POST["nama_makanan"],
            "harga" => $_POST["harga"],
            "satuan" => $_POST["satuan"],
            "nama" => $_POST["nama"],
            "qty" =>$_POST["qty"]
        ];

        $new_order = json_encode($_data_order, JSON_PRETTY_PRINT);
        $file = fopen("order.json", "w");
        fwrite($file, $new_order);
        fclose($file);
        header("Location: transaksi.php");
    
    }
     ?>
    
</body>
</html>