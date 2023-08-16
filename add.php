<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Makanan- Sistem Informasi Makanan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="add.php" method="post">
    <table id="customers">
        <tr>
            <th colspan="2">
                <h3>Tambah Makanan</h3>
            </th>
        </tr>
        <tr>
            <td>Nama Makanan</td>
            <td><input type="text" name="nama_makanan" id="nama_makanan"></td>
        </tr>

        <tr>
            <td>Satuan</td>
            <td><input type="text" name="satuan" id="satuan"></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="number" name="harga" id="harga"></td>
        </tr>
        <tr>
            <td></td>
            <td><button style="background-color: #199319;color: white;padding: 5px 15px; 
            text-decoration: none;" type="submit">Simpan</button>
        </tr>

        
    </table>
    </form>

    <?php
        if(@($_POST)){
            $file_json = file_get_contents('dbmakanan.json');
            $data_makanan = json_decode($file_json, true);
   
           foreach ($data_makanan as $key => $value) {
               $_data_makanan[] = [
                "nama_makanan" => $value["nama_makanan"],
                "harga" => $value["harga"],
                "satuan" => $value["satuan"]
               ];
           }

           $_data_makanan[] = [
            "nama_makanan" => $_POST["nama_makanan"],
                "harga" => $_POST["harga"],
                "satuan" => $_POST["satuan"]
           ];
        
        
        //    print_r($_data_makanan);
        //    exit;
        $new_makanan = json_encode($_data_makanan, JSON_PRETTY_PRINT);
        $file = fopen("dbmakanan.json", "w");
        fwrite($file, $new_makanan);
        fclose($file);
        header("Location: read.php");
    }
        ?>
    
</body>
</html>