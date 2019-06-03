<link rel='stylesheet' type='text/css' href='style.css'/> 

<?php
echo "<p><b>Øvelse og publikum</b></p>";
$db=new mysqli("localhost","root","","skiVM");
$sql = "Select ovelser.Type,ovelser.Dato,ovelser.Tid,ovelser.Sted,persondata.Fornavn,persondata.Etternavn from ovelser,persondata";
$resultat=$db->query($sql);
$antallRader = $db->affected_rows;
echo "<table border='1'>";
echo "<td><b>Type</b></td>";
echo "<td><b>Dato</b></td>";
echo "<td><b>Tid</b></td>";
echo "<td><b>Sted</b></td>";
echo "<td><b>Fornavn</b></td>";
echo "<td><b>Etternavn</b></td>";
for ($i=0;$i<$antallRader;$i++)
{
$rad=$resultat->fetch_object();
echo "<tr>";
echo "<td>".$rad->Type."</td>";
echo "<td>".$rad->Dato."</td>";
echo "<td>".$rad->Tid."</td>";
echo "<td>".$rad->Sted."</td>";
echo "<td>".$rad->Fornavn."</td>";
echo "<td>".$rad->Etternavn."</td>";
echo "</tr>";
}
echo "</table>";
echo "<p><a href='hjem.php'>Tilbake til hjem</a></p>"; 
?>