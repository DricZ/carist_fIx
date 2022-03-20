<?php
    require "sys/connect.php";

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload New Post</title>
</head>
<body>
    <form method="post" action="sys/upload_news.php" enctype="multipart/form-data" autocomplete="off">
        Foto Thumbnail: <br><input type="file" name="img" required><br>
        Judul: <input type="text" name="title"><br>
        News: <br><textarea name="news" rows="50" cols="90"></textarea><br>
        <button type="submit">Post</button>
    </form>
</body>
</html>