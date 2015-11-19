<?php
require_once "db.php";
session_start();

if ( isset($_POST['Message']) && isset($_POST['Location'])) {
    $sql = "INSERT INTO attributes (Message, Location)
              VALUES (:Message, :Location)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':Message' => $_POST['Message'],
        ':Location' => $_POST['Location']));
   $_SESSION['success'] = 'Record Added';
   header( 'Location: index.php' ) ;
   return;
}
?>

<p>Add A New Note</p>
<form method="post">
<p>Message:
<input type="text" name="Message"></p>
<p>Location:
<input type="text" name="Location"></p>
<p><input type="submit" value="Add New"/>
<a href="index.php">Cancel</a></p>
</form>
