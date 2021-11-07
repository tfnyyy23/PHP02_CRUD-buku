<?php 

include "koneksi.php";

$id = $_GET['id_buku'];

if( isset($_POST["submit"])){
    $judul_buku = $_POST["judul_buku"];
    $penulis = $_POST["penulis"];
    $id_jenis = $_POST["id_jenis"];

    mysqli_query($koneksi, "update buku set judul_buku='$judul_buku', penulis='$penulis', id_jenis='$id_jenis' where id_buku='$id'");

    if( mysqli_affected_rows($koneksi) > 0){
        echo "<script>alert('Data Berhasil Diubah');
        document.location.href = 'index.php';</script>";
    } else{
        echo "<script>alert('Data Gagal Diubah')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Update Data Buku</title>
</head>
<body>
    <h1 align="center">Update Data Buku</h1>
<form action="" method="post">
    <table align="center">
    <?php 
    $id = $_GET['id_buku'];
    $result = mysqli_query($koneksi, "select * from buku where id_buku='$id'");
    while($row = mysqli_fetch_assoc($result)):?>
    <tr>
         <td><label for="judul_buku" class="form-label mt-4">Judul Buku</label>
         <input type="text" size="60" class="form-control mt-2 ms-3" id="judul_buku" name="judul_buku" value="<?php echo $row['judul_buku']; ?>"  required></td>
    </tr>
    <tr>
         <td><label for="penulis" class="form-label mt-4">Penulis</label>
         <input type="text" size="60" class="form-control mt-2 ms-3" id="penulis" name="penulis" value="<?php echo $row['penulis']; ?>"  required></td>
    </tr>
    <tr>
         <td><label for="jenis_buku" class="form-label mt-4">ID Jenis</label>
         <input type="text" size="60" class="form-control mt-2 ms-3" id="id_jenis" name="id_jenis" value="<?php echo $row['jenis_buku']; ?>"></td>
    </tr>
    <tr>
         <td><label for="gambar_buku" class="form-label mt-4">Gambar Buku</label>
         <input type="text" size="60" class="form-control mt-2 ms-3" id="gambar_buku" name="gambar_buku" value="<?php echo $row['gambar_buku']; ?>"  required disabled></td>
    </tr>
    <tr>
         <td><button type="submit" class="btn btn-success mt-3 pr-3 pl-3" style="margin-left: 15rem;" name="submit">Simpan</button></td>
    </tr>
</table>
<?php endwhile; ?>
</form>
 <!-- Option 1: Bootstrap Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>


