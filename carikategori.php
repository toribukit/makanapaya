<?php 

include("koneksi.php");

if (isset($_GET["Harga"])){
 $harga=$_GET["Harga"] ;
 $harga= mysqli_real_escape_string($mysqli, $harga);
 $lokasi=$_GET["Lokasi"] ;
 $lokasi= mysqli_real_escape_string($mysqli, $lokasi);
 $jenis_makanan=$_GET["Jenis_Makanan"];
 $jenis_makanan= mysqli_real_escape_string($mysqli, $jenis_makanan);
 $jenis_tempat_makan=$_GET["Jenis_Tempat_Makan"] ;
 $jenis_tempat_makan= mysqli_real_escape_string($mysqli, $jenis_tempat_makan);
 $rating=$_GET["Rating"] ;
 $rating= mysqli_real_escape_string($mysqli, $rating);
 
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
if($harga !="null" and $jenis_makanan != 0){
$query1="SELECT tempat_makan FROM menu WHERE harga $harga and jenis_makanan = $jenis_makanan";

}
else if($harga != "null"){
$query1="SELECT tempat_makan FROM menu WHERE harga $harga";
}
else if($jenis_makanan != 0){
$query1="SELECT tempat_makan FROM menu WHERE jenis_makanan = $jenis_makanan";
}
else {
$query1="";
}

if($query1 !=""){
	
$result1= mysqli_query($mysqli, $query1) or die (mysqli_error($mysqli));

if(mysqli_num_rows($result1) > 0){ 
while ($row1 = mysqli_fetch_row($result1)) {
	$query2="SELECT*FROM tempat_makan WHERE id= $row1[0] ";
	if($lokasi != 0 ) {
	$query2 .= "and jenis_lokasi =  $lokasi ";
	}
	if ($jenis_tempat_makan != 0){
	$query2 .="and kategori = $jenis_tempat_makan ";
	}
	if ($rating !="null") {
	$query2 .="and rating $rating ";
	}
	if ($lokasi=0 and $jenis_tempat_makan=0 and $rating="null"){
	$query2 ="";
	
	}
}
if($query2 !=""){
$result2= mysqli_query($mysqli, $query2) or die (mysqli_error($mysqli));
}
if(mysqli_num_rows($result2) > 0){
while ($row2 = mysqli_fetch_row($result2)) {
print("<table border=0 width=\"70%\">");
print("<tr height=\"18%\"><td align= left  valign=\"bottom\" width=\"60%\" style=\"font-size:25px;\"><b>".$row2[1]."</b></td>");
print("<td rowspan=\"3\" width=\"40%\"><img name=\"cari\" src=\"images/caloria.jpg\" width=\"300\" height=\"300\" alt=\"\" /></td></tr> ");
print("<tr><td align= left valign=\"top\" width=\"60%\" height=\"72%\">".$row2[6]."</td></tr>");
print("<tr><td align=right  height=\"10%\"><a href=\"tempatmakan.php?id=".$row[0]."\" >read more</a></td></tr>");
//print($row2[0]."<br>"."<br>".$row2[2]."<br>");
print("</table>");
print("<br>");
print("<br>");
}
}
else {
print("Data Tidak ditemukan");
}
}
else {
print("Data Tidak ditemukan");
}
}

else {
$query2="SELECT*FROM tempat_makan WHERE id >= 0 ";
if($lokasi != 0 ) {
	$query2 .= "and jenis_lokasi =  $lokasi ";
	}
if ($jenis_tempat_makan != 0){
	$query2 .="and kategori = $jenis_tempat_makan ";
	}
if ($rating !="null") {
	$query2 .="and rating $rating ";
	}
$result2= mysqli_query($mysqli, $query2) or die (mysqli_error($mysqli));
if(mysqli_num_rows($result2) > 0){
while ($row2 = mysqli_fetch_row($result2)) {
//print($row2[0]."<br>".$row2[1]."<br>".$row2[2]."<br>");
print("<table border=0 width=\"70%\">");
print("<tr height=\"18%\"><td align= left  valign=\"bottom\" width=\"60%\" style=\"font-size:25px;\"><b>".$row2[1]."</b></td>");
print("<td rowspan=\"3\" width=\"40%\"><img name=\"cari\" src=\"images/caloria.jpg\" width=\"300\" height=\"300\" alt=\"\" /></td></tr> ");
print("<tr><td align= left valign=\"top\" width=\"60%\" height=\"72%\">".$row2[6]."</td></tr>");
print("<tr><td align=right  height=\"10%\"><a href=\"tempatmakan.php?id=$row2[0]\" >read more</a></td></tr>");
//print($row2[0]."<br>"."<br>".$row2[2]."<br>");
print("</table>");
print("<br>");
print("<br>");
}
}
else {
print("Data Tidak ditemukan");
}
}






?>
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
