
<?php

mysql_connect("localhost","root","") or die ("nu se poate conecta la serverul MySQL");
mysql_select_db("admitere") or die ("nu se poate deschide baza de date");
$query=mysql_query("select * from candidati");
$nr_inreg=mysql_num_rows($query);
echo "<center>";"
echo "Numarul de inregistrari:  . "$nr_inreg";
echo "</center>";
if ($nr_inreg>0){

echo "<table align='center' border='1'>";
echo "<tr>";
echo "<th bgcolor='red'>Id</th>";
echo "<th bgcolor='red'>Nume</th>";
echo "<th bgcolor='red'>Prenume</th>";
echo "<th bgcolor='red'>Adresa</th>";
echo "<th bgcolor='red'>Media bac</th>";
echo "<th bgcolor='red'>Media multianuala mate</th>";
echo "</tr>";


while ($row = mysql_fetch_row($query))
{
	echo "<tr>";
	foreach ($row as $value)
{
echo "<td>$value</td>";
}
echo "</tr>";
}
echo "</table>";

$media_bacalaureat=mysql_query("select min(media_bac) from candidati");
$medie=mysql_result($media_bacalaureat,0);
echo "<center>";
echo "Media minima bacalaureat: " . "$medie";
echo "</center>";

$medie_multianuala=mysql_query("select min(media_multianuala_matematica) from candidati");
$medie_mate=mysql_result($medie_multianuala,0);
echo "<center>";
echo "Media multianuala  minima la matematica : " . "$medie_mate";
echo "</center>";


}
else 
	die ("Nu gasesc nici o inregistrare");
mysql_close();
?>