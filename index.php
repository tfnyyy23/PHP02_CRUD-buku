<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Dashboard</title>
</head>
<body>
<h1 align="center">Daftar Buku</h1>
<a href="masukbuku.php" type="button" class="btn btn-success ms-3 md-3">Tambah Data Buku</a>

<form action="index.php" method="post">
<table>
    <tr>
        <td><input class="ms-3 mt-3 form-control" type="text" name="cari" size="40" placeholder="Masukkan kata kunci judul buku..."></td>
        <td><button type="submit" class="mt-3 ms-4 btn btn-success" >Cari Data</button></td>
    </tr>
</table>
</form>
<?php 
if(isset($_POST['cari'])){
	$cari = $_POST['cari'];
	echo '<br><b class="ms-3">Hasil pencarian : '.$cari.'</b><br>';
}
?>
<br>
    <table class="table">
    <thead></thead>
    <tr>
        <td>ID Buku</td>
        <td>Judul</td>
        <td>Penulis</td>
        <td>ID Jenis</td>
        <td>Gambar</td>
        <td>Pengaturan</td>
    </tr>
    </thead>

    <?php 
    if(isset($_POST['cari'])){
		$cari = $_POST['cari'];
		$data = mysqli_query($koneksi, "select * from buku where judul_buku like '%".$cari."%'");				
	}else{
		$data = mysqli_query($koneksi, "select * from buku");		
	}
    while($row = mysqli_fetch_assoc($data)):?>
    <tbody>
    <tr>
        <td><?php echo $row['id_buku'];?></td>
        <td><?php echo $row['judul_buku'];?></td>
        <td><?php echo $row['penulis'];?></td>
        <td><?php echo $row['id_jenis'];?></td>
        <td><img src="img/<?php echo $row['gambar_buku'];?>" alt="" width="50"></td>
        <td><a type="button" class="btn btn-success" href="ubahbuku.php?id_buku=<?php echo $row['id_buku']; ?>">Ubah</a>
        <a type="button" class="btn btn-danger" href="hapusbuku.php?id_buku=<?php echo $row['id_buku']; ?>">Hapus</a>
        </td>
    </tr>
    </tbody>
    <?php endwhile;?>
    </table>

     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>