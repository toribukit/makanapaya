<?php
include("koneksi.php");

if (isset($_GET["id"])){
$id=$_GET["id"] ;
$id= mysqli_real_escape_string($mysqli, $id);
}
else {
header("location:index.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Makan Apaya ?</title>

<style>

table {
    border-collapse: collapse;
}
</style>


</head>

<body>
<table width="100%" >
<tr><td width=100%>
<center>
<h1>Makan Apa Ya ? </h1>
<h4>Portal pencarian tempat makan di Surabaya </h4>
</center>
</td></tr>
<tr>
<td bgcolor="#666666">
<span align = "right">
<form id="login" name="login" method="post" action="">
<input type="text" id="username" name="username" maxlength ="25" />
<input type="password" id="password" name="password" maxlength ="25" />
<input type="submit" name="blogin" id="blogin" value="Sign in" />


</form>
</span>
</td>
<td bgcolor="#666666" >
<span align = "right">
<form id="signup" name="signup" method="post" action="signup.php">
<input type="submit" name="bsignup" id="bsignup" value="Sign up" />

</form>

</span>
</td>
</tr>
</table>
<br />


<table width="100%" border="1">
<tr>
<td width="9%">
</td>
<td width="56%">
<span align = "left">
<a href="index.php" >Beranda</a>
|
<a href="about.php">Tentang Kami</a>
|
<a href="listtempatmakan.php">Daftar Tempat Makan</a>
|
<a href="kontak.php">Kontak</a>
</span>
</td>
<td width="25%">
<span align = "right">
<form>
<input class="inputan" type="text" placeholder="Cari disini..."required>
<button class="submit" type="submit">Cari</button>
</form>
</span>

</td>
<td width="9%">
</td>
</tr>
</table>
<br />
<br />
<table width="100%" border=1px>
<tr>
<td width="9%">
</td>
<td width="18%" valign="top">
Cari Berdasarkan Kategori
<br />
<br />
<table width="90%" border=1px>
<tr>
<td>
<form action="carikategori.php" method="get" name="cari_kategori">
<select name="Harga" size="1" >

<option value="null" selected="selected">Pilih Harga</option>
<option value="between 0 and 29">dibawah 30 k</option>
<option value="between 30 and 49">30k - 50k</option>
<option value="between 50 and 99">50k - 100k</option>
<option value=" >= 100">diatas100k</option>
</select>

<br />
<br />
</td>
</tr>
<tr>
<td>
<select name="Lokasi" size="1">
<option value=0 selected="selected">Pilih Lokasi</option>
<?php
$query = "SELECT*FROM jenis_lokasi";
$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli)); 
if(mysqli_num_rows($result) > 0){
while ($row = mysqli_fetch_row($result)){
	print("<option value=$row[0]>$row[1]</option>");
}
}

?>
</select>
<br />
<br />
</td>
</tr>
<tr>
<td>
<select name="Jenis_Makanan" size="1">
<option value =0 selected="selected">Pilih Jenis Makanan</option>
<?php
$query = "SELECT * FROM jenis_makanan";
$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli)); 
if(mysqli_num_rows($result) > 0){
while ($row = mysqli_fetch_row($result)){
	print("<option value=$row[0]>$row[1]</option>");
}
}

?>
</select>
<br />
<br />
</td>
</tr>
<tr>
<td>
<select name="Jenis_Tempat_Makan">
<option value =0 selected="selected">Pilih Jenis Tempat Makan</option>
<?php
$query = "SELECT * FROM daftar_kategori";
$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli)); 
if(mysqli_num_rows($result) > 0){
while ($row = mysqli_fetch_row($result)){
	print("<option value=$row[0]>$row[1]</option>");
}
}

?>
</select>
<br />
<br />
</td>
</tr>
<tr>
<td>
<select name="Rating">
<option value="null" selected="selected">Pilih Rating</option>
<option value="between 1 and 1.9">1 Stars</option>
<option value="between 2 and 2.9">2 Stars</option>
<option value="between 3 and 3.9">3 Stars</option>
<option value="between 4 and 4.9">4 Stars</option>
<option value="between 5 and 5.9">5 Stars</option>


</select>
<br />
<br />
<button value="Cari" type="submit">Cari</button>
</form>
</td>
</tr>


</table>
</td>
<td width="56%" valign="top" align="center">
<?php
$query="SELECT * FROM tempat_makan WHERE id= $id";
$result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
if(mysqli_num_rows($result) > 0){
while ($row = mysqli_fetch_row($result)) {
	$nama = $row[1];
	$lokasi = $row[2];
	$deskripsi = $row[6];
	$rating = $row[8];
}
}
else {
header("location:index.php");
}

?>
<table width="90%" border="1">
<tr>
<td width="60%">
<table border="1">
<tr>
<td style="font-size:30px;"><?php print($nama); ?> | <a href="">Testimoni</a></td>
</tr>
<tr>
<td>Rating : <?php print($rating); ?></td>
</tr>
<tr>
<td>Lokasi : <?php print($lokasi); ?></td>
</tr>
<tr>
<td> <?php print($deskripsi); ?></td>
</tr>
</table>
<br />
<br />
<table border="1" width="90%">
<tr>
<td style="font-size:30px;" colspan="2" align="center">Our Menu</td>
</tr>
<tr style="font-size:24px;" align="center">
<td>Menu</td>
<td>Harga</td>
</tr>
</table>
</td>
<td width="40%"></td>

</table>


</td>
<td width="9%">
</td>
</tr>
</table>

<br />
<br />

<table width="100%" border="1">
<tr>
<td bgcolor="#666633" align="center" width:100%>
Created by Tori
</td>
</tr>
</table>





</body>
</html>
