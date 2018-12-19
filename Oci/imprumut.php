<?php
$titlu_carte=$_POST['titlu_carte'];
$connection=OCILogon("student","student","XE");
$stmt1=OCIParse($connection,"select NR_EXEMPLARE from evidenta_carti where TITLU_CARTE='$titlu_carte'");
$stmt2=OCIParse($connection,"select count(*) from evidenta_carti where TITLU_CARTE='$titlu_carte'");
OCIExecute($stmt1);
$row=OCI_Fetch_Row($stmt1);
$nr_exemplare=$row[0];

OCIExecute($stmt2);
$row=OCI_Fetch_Row($stmt2);
$nr=$row[0];

echo $nr_exemplare;
if($nr_exemplare>0){
$stmt=OCIParse($connection,"update evidenta_carti set NR_EXEMPLARE=$nr_exemplare-1 where TITLU_CARTE='$titlu_carte'");
OCIExecute($stmt);
OCIFreeStatement($stmt);
OCILogoff($connection);
}
else{
echo "Nu mai sunt exemplare pt cartea respectiva!";
}

if($nr==0){
echo "Cartea nu exista in baza de date!";
}


?>