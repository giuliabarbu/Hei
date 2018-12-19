<?php
$connection=OCILogon("student","student","XE");
$stmt=OCIParse($connection,"SELECT * FROM evidenta_carti");
OCIExecute($stmt);

echo "<table border='2' align='center'>";
echo "<tr>";
echo "<th>Cod ISBN</th>";
echo "<th>Titlu carte</th>";
echo "<th>Autor</th>";
echo "<th>Editura</th>";
echo "<th>Nr exemplare</th>";
echo "<th>Anul aparitiei</th>";
echo "</tr>";

while(OCIFetch($stmt))
{
	$cod_isbn=OCIResult($stmt,"COD_ISBN");
	$titlu=OCIResult($stmt,"TITLU_CARTE");
	$autor=OCIResult($stmt,"AUTOR_CARTE");
	$editura=OCIResult($stmt,"EDITURA");
	$nr_exemplare=OCIResult($stmt,"NR_EXEMPLARE");
	$anul=OCIResult($stmt,"ANUL_APARITIEI");
	print("<tr>".
	"<td>$cod_isbn</td>".
	"<td>$titlu</td>".
	"<td>$autor</td>".
	"<td>$editura</td>".
	"<td>$nr_exemplare</td>".
	"<td>$anul</td>".
	"</tr>");
}

OCIFreeStatement($stmt);
OCILogoff($connection);
