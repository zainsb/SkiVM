<form action="" method="post">
    <table border="1">
    <tr>
    <td>Type øvelser:</td>
    <td><select size="1" name="type">
    <option>Langrenn</option>
    <option>Kombinert</option>
    <option>Skihopp</option>
    </select><br/></td>
    </tr>
    <tr>
    <td>Dato:</td>
    <td><input type="date" name="dato"/><br/></td>
    <tr/>
    <tr>
    <td>Tid:</td>
    <td><input type="time" name="tid"/><br/></td>
    <tr/>
    <tr>
    <td>Sted:</td>
    <td><input type="text" name="sted"/></td>
    <tr/>
    <table/>
    <td><input type="submit" name="knapp" value="Registrer øvelse"/></td>
    
</form>

<?php
if(isset($_REQUEST["knapp"]))
{
$type=$_REQUEST["type"];
$dato=$_REQUEST["dato"];
$tid=$_REQUEST["tid"];
$sted=$_REQUEST["sted"];

$db = mysqli_connect("localhost","root","","skiVM"); 
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
?>