<?php

mysql_connect("localhost","root","") or die ("Nu se poate conecta la serverul MySql");
mysql_select_db("admitere") or die ("Nu se poate deschide baza de date");

$id=$_POST['id'];
$nume=$_POST['nume'];
$query1=mysql_query("select * from candidati where id='$id' and nume='$nume'");
$nr_inreg=mysql_fetch_row($query1);

if($nr_inreg > 0)
{
$query=mysql_query("delete from candidati where id='$id' and nume = '$nume'");
echo "Stergerea s-a efectuat cu succes";
}
else
echo "Persoana nu exista in baza de date";
mysql_close();


?>