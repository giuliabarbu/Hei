<?php

mysql_connect("localhost","root","") or die("Nu se poate conecta la server MySql");
mysql_select_db("admitere") or die ("Nu se poate deschide baza de date");

$id=$_POST['id'];
$media_bac_modificata=$_POST['media_bac_modificata'];
$query1=mysql_query("select count(*) from candidati where id='$id'");
$row=mysql_fetch_row($query1);
$nr=$row[0];
if($nr!=0)
{


$query=mysql_query("update candidati set media_bac='$media_bac_modificata' where id='$id'");
echo "Updatare facuta cu succes";
}
else
echo "Persoana nu exista";
mysql_close();


?>