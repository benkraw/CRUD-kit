<?php
require_once "db.php";
session_start();
?>
<html>
<head></head><body>
<?php
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
if ( isset($_SESSION['success']) ) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
}
echo('<table border="1">'."\n");
$stmt = $pdo->query("SELECT Message, Location 
FROM attributes");
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo "<tr><td>";
    echo($row['Message']);
    echo("</td><td>");
    echo($row['Location']);
    echo("</td><td>");
    //echo($row['Date']);
    //echo("</td><td>");
    echo('<a href="edit.php?id='.htmlentities($row['id']).
'">Edit</a> / ');
    echo('<a href="delete.php?id='.htmlentities($row['id']).
'">Delete</a>');
    echo("\n</form>\n");
    echo("</td></tr>\n");
}
?>
</table>
<a href="add.php">Add New</a>
