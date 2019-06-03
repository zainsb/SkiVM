<link rel='stylesheet' type='text/css' href='style.css'/> 

<form action="" method="post">
    <table border="0">            
            <p><b>Slett øvelse</b></p>
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
            <td><input type="submit" name="knapp" value="Slett øvelse"/></td>
            </tr>
            <table/>
</form>

<?php
if(isset($_REQUEST["knapp"]))
{
$db = mysqli_connect("localhost","root","","skiVM"); 
$slett = $_REQUEST["type"];	
$sql = "DELETE FROM ovelser WHERE Type = '$slett'";
$slett = $_REQUEST["dato"];	
$sql = "DELETE FROM ovelser WHERE Dato = '$slett'";
$slett = $_REQUEST["tid"];	
$sql = "DELETE FROM ovelser WHERE Tid = '$slett'";
$slett = $_REQUEST["sted"];	
$sql = "DELETE FROM ovelser WHERE Sted = '$slett'";

if(mysqli_query($db,$sql))
{	
if (mysqli_affected_rows($db)>0) 
{	
    echo "<p>Øvelse er slettet</p>";
}	
else				
{	
    echo "<p>Fant ikke øvelse for sletting</p>";
}	
}
else			
{
    echo mysqli_error($db);
}
}
 echo "<p><a href='hjem.php'>Tilbake til hjem</a></p>"; 
?>

