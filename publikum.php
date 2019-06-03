<link rel='stylesheet' type='text/css' href='style.css'/> 

<form action="" method="post">
            <table border="0">    
            <p><b>Registring for publikum</b></p>
            <tr>
            <td>Fornavn:</td>
            <td><input type="text" name="fornavn"/></td>
            <tr/>
            <tr>
            <td>Etternavn:</td>
            <td><input type="text" name="etternavn"/></td>
            <tr/>
            <tr>
            <td> Adresse:</td>
            <td><input type="text" name="adresse"/></td>
            <tr/>
            <tr>
            <td>Postnr:</td>
            <td><input type="text" name="postnr"/></td>
            <tr/>
            <tr>
            <td>Poststed:</td>
            <td><input type="text" name="poststed"/></td>
            <tr/>
            <tr>
            <td>Telefonnr:</td>
            <td><input type="text" name="telefonnr"/></td>
            <tr/>
            
            <td>Øvelse:</td>
            <td>------------------------</td>
            <tr>
            <td>Type:</td>
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
            <td><input type="submit" name="knapp" value="Registrer"/></td>
            </tr>
            </table>
</form>

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
 echo "<p>Registering er klart!</p>";
 if(!$data)
 {
 echo "<p>Feil, klarte ikke å registere data</p>". mysqli_error($db);
 }
 elseif(mysqli_affected_rows($db)==0)
 {
 echo "<p>Feil, ingen rader er satt inn</p>";
 }
}
 echo "<p><a href='hjem.php'>Tilbake til hjem</a></p>"; 
?>