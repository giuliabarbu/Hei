<?php

mysql_connect("localhost","root","") or die("Nu se poate conecta la serverul MySql");
mysql_select_db("admitere") or die (" Nu se poate deschide baza de date");

$id=$_POST['id'];
$nume=$_POST['nume'];
$prenume=$_POST['prenume'];
$adresa=$_POST['adresa'];
$media_bac=$_POST['media_bac'];
$media_multianuala_matematica=$_POST['media_multianuala_matematica'];

$query=mysql_query("select count(*) from candidati where id='$id'");
$row=mysql_fetch_row($query);
$nr=$row[0];
if( $nr==0) {
	$query1=mysql_query("insert into candidati values ($id, '$nume', '$prenume', '$adresa', $media_bac, $media_multianuala_matematica)");
		echo "Inserare cu succes";
}
else
echo "Candidatul respectiv exista deja in baza de date";


mysql_close();

?>