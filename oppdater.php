<link rel='stylesheet' type='text/css' href='style.css'/> 

<form action="" method="post">
    <table border="0">
            <p><b>Oppdater øvelse</b></p>
            <tr>
            <td>Etternavn:</td>
            <td><input type="text" name="etternavn"/></td>
            <tr/>
            <tr>
            <td>Type øvelser:</td>
            <td><select size="1" name="type">
            <option>Langrenn</option>
            <option>Kombinert</option>
            <option>Skihopp</option>
            </select><br/></td>
            </tr>
            <tr>
            <td>Sted:</td>
            <td><input type="text" name="sted"/></td>
            <tr/>
            <tr>
            <td>Dato:</td>
            <td><input type="date" name="dato"/><br/></td>
            <tr/>
            <tr>
            <td>Tid:</td>
            <td><input type="time" name="tid"/><br/></td>
            <tr/>
            <tr>
            <td><input type="submit" name="knapp" value="Oppdater øvelse"/></td>
            </tr>
            <table/>
</form>
<?php
if(isset($_REQUEST["knapp"]))
{
/*$db = mysqli_connect("localhost","root","","skiVM"); 
$slett = $_REQUEST["type"];	
$sql = "UPDATE FROM ovelser WHERE Type = '$slett'";
$slett = $_REQUEST["dato"];	
$sql = "UPDATE FROM ovelser WHERE Dato = '$slett'";
$slett = $_REQUEST["tid"];	
$sql = "UPDATE FROM ovelser WHERE Tid = '$slett'";
$slett = $_REQUEST["sted"];	
$sql = "UPDATE FROM ovelser WHERE Sted = '$slett'";*/
    
$type=$_REQUEST["type"];
$dato=$_REQUEST["dato"];
$tid=$_REQUEST["tid"];
$sted=$_REQUEST["sted"];

$db = mysqli_connect("localhost","root","","skiVM");
$sql = "UPDATE ovelser,persondata SET Type = '$type', Dato = '$dato', Tid = '$tid', Sted = '$sted'";	
$sql.= "WHERE Etternavn = '".$_REQUEST["etternavn"]."'";

/*$db = mysqli_connect("localhost","root","","skiVM");
$oppdater = $_REQUEST["type"];	
$sql = "UPDATE FROM ovelser WHERE Type = '$oppdater'";*/

if(mysqli_query($db,$sql))
{	
if (mysqli_affected_rows($db)>0) 
{	
    echo "<p>Øvelse er endret</p>";
}	
else				
{	
    echo "<p>Fant ikke øvelse for endring</p>";
}	
}
else			
{
    echo mysqli_error($db);
}
}
 echo "<p><a href='hjem.php'>Tilbake til hjem</a></p>"; 
?>

