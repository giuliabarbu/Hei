<?php
$titlu_carte=$_POST['titlu_carte'];
$connection=OCILogon("student","student","XE");
$stmt1=OCIParse($connection,"select count(*) from evidenta_carti where TITLU_CARTE='$titlu_carte'");
OCIExecute($stmt1);
$row=OCI_Fetch_Row($stmt1);
$nr=$row[0];
echo $nr;
if($nr>0){
$stmt=OCIParse($connection,"delete from evidenta_carti where TITLU_CARTE='$titlu_carte'");
OCIExecute($stmt);
OCIFreeStatement($stmt);
OCILogoff($connection);
}
else{
echo "Cartea nu exista in baza de date!";
}



?>