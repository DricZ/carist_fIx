<?php
    require "sys/connect.php";

    class Product{
        private $id;
        private $image;
        private $nama;
        private $deskripsi;
        private $kandungan;
        private $cara_pakai;
        private $bpom;
        private $harga;

        function __construct($_id, $_image, $_nama, $_deskripsi, $_kandungan, $_cara_pakai, $_bpom, $_harga=0)
        {
            $this->id = $_id;
            $this->image = $_image;
            $this->nama = $_nama;
            $this->deskripsi = $_deskripsi;
            $this->kandungan = $_kandungan;
            $this->cara_pakai = $_cara_pakai;
            $this->bpom = $_bpom;
            $this->harga = $_harga;
        }

        function get_id() {
            return $this->id;
        }
        function get_image() {
            return $this->image;
        }
        function get_nama() {
            return $this->nama;
        }
        function get_deskripsi() {
            return $this->deskripsi;
        }
        function get_kandungan() {
            return $this->kandungan;
        }
        function get_cara_pakai() {
            return $this->cara_pakai;
        }
        function get_bpom() {
            return $this->bpom;
        }
        function get_harga() {
            return $this->harga;
        }
    }

    //Buat array
    $products = array();

    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Foto</th>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th>Kandungan</th>
                <th>Cara Pakai</th>
                <th>BPOM</th>
            </tr>";

    $sql = "SELECT * FROM product";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $relative = "../img/PRODUK/";
            $img = $row['img'];
            $path = $relative . $img;
            $nama = $row['nama'];
            $deskripsi = $row['deskripsi'];
            $kandungan = $row['kandungan'];
            $cara_pakai = $row['cara_pakai'];
            $bpom = $row['bpom'];

            //Buat Object
            $obj = new Product($id, $img, $nama, $deskripsi, $kandungan, $cara_pakai, $bpom);
            array_push($products, $obj);
            //Masukkan ke array

            //Display
            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td><img src='$path' width='200'></td>";
            echo "<td><b>$nama</b></td>";
            echo "<td style='white-space: pre-line'>$deskripsi</td>";
            echo "<td style='white-space: pre-line'>$kandungan</td>";
            echo "<td style='white-space: pre-line'>$cara_pakai</td>";
            echo "<td>$bpom</td>";
            echo "</tr>";
            
        }
    }

    echo "</table>";

    
?>
