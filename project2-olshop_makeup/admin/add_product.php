<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <h1>Upload Produk Baru</h1>
    <form method="post" action="sys/upload_product.php" enctype="multipart/form-data">
        Foto Produk: <input type="file" name="image" required><br>
        Nama: <input type="text" name="nama"><br>
        Deskripsi: <textarea name="deskripsi" rows="10" cols="30"></textarea><br>
        Kandungan: <textarea name="kandungan" rows="10" cols="30"></textarea><br>
        Cara Pakai: <textarea name="cara_pakai" rows="10" cols="30"></textarea><br>
        No BPOM: <input type="text" name="bpom"><br>
        <button type="submit">ADD</button>
    </form>
</body>
</html>