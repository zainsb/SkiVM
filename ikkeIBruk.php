<?php

if(isset($_REQUEST["knapp"]))
{
 $fornavn=$_REQUEST["fornavn"];
 $etternavn=$_REQUEST["etternavn"];
 $adresse=$_REQUEST["adresse"];
 $postnr=$_REQUEST["postnr"];
 $poststed=$_REQUEST["poststed"];
 $telefonnr=$_REQUEST["telefonnr"];
 $type=$_REQUEST["type"];
 $dato=$_REQUEST["dato"];
 $tid=$_REQUEST["tid"];
 $sted=$_REQUEST["sted"];
 $db = mysqli_connect("localhost","root","","skiVM"); 
 $sql = "Insert INTO persondata (Fornavn,Etternavn,Adresse,Postnr,Poststed,Telefonnr)";
 $sql .="Values ('$fornavn','$etternavn','$adresse','$postnr','$poststed','$telefonnr')";
 $data = mysqli_query($db,$sql);
 $sql = "Insert INTO ovelser (Type,Dato,Tid,Sted)";
 $sql .="Values ('$type','$dato','$tid','$sted')";
 $data = mysqli_query($db,$sql);
 echo "Registering er klart! <br/>";
 if(!$data)
 {
 echo "Feil, klarte ikke å registere data". mysqli_error($db);
 }
 elseif(mysqli_affected_rows($db)==0)
 {
 echo "Feil, ingen rader er satt inn";
 }
}

$db=new mysqli("localhost","root","","skiVM");
$sql = "Select Fornavn,Etternavn from persondata";
$resultat=$db->query($sql);

$antallRader = $db->affected_rows;
for ($i=0;$i<$antallRader;$i++)
{
$rad=$resultat->fetch_object();
echo $rad->Etternavn." ".$rad->Fornavn."<br/>";
}

$sql = "Select Type,Dato,Tid,Sted from ovelser";
$resultat=$db->query($sql);
$antallRader = $db->affected_rows;
for ($i=0;$i<$antallRader;$i++)
{
$rad=$resultat->fetch_object();
echo $rad->Type." ".$rad->Dato."<br/>";
echo $rad->Tid." ".$rad->Sted."<br/>";
}
?>