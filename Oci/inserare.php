<?php
$cod_isbn=$_POST['cod_isbn'];
$titlu_carte=$_POST['titlu_carte'];
$autor_carte=$_POST['autor_carte'];
$editura=$_POST['editura'];
$nr_exemplare=$_POST['nr_exemplare'];
$anul=$_POST['anul'];

$connection=OCILogon("student","student","XE");
$stmt1=OCIParse($connection,"select count(*) from evidenta_carti where COD_ISBN=$cod_isbn");
OCIExecute($stmt1);
$row=OCI_Fetch_Row($stmt1);
$nr=$row[0];
echo $nr;
if($nr>0){
echo "Cartea exista deja in baza de date!";
}
else{
$stmt=OCIParse($connection,"insert into evidenta_carti values($cod_isbn,'$titlu_carte','$autor_carte','$editura',$nr_exemplare,$anul)");
OCIExecute($stmt);
}


OCIFreeStatement($stmt);
OCILogoff($connection);
?>