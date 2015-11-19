<?php
require_once "db.php";
session_start();

if ( isset($_POST['Message']) && isset($_POST['Location'])) {
    $sql = "UPDATE attributes SET Message = :Message, 
            Location = :Location,
            WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':Message' => $_POST['Message'],
        ':Location' => $_POST['Location'],
        ':id' => $_POST['id']));
    $_SESSION['success'] = 'Record updated';
    header( 'Location: index.php' ) ;
    return;
}

$stmt = $pdo->prepare("SELECT * FROM  where id = :xyz");
$stmt->execute(array(":xyz" => $_GET['id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value for id';
    header( 'Location: index.php' ) ;
    return;
}

$m = htmlentities($row['Message']);
$l = htmlentities($row['Location']);

echo <<< _END
<p>Edit Note</p>
<form method="post">
<p>Message:
<input type="text" name="Message" value="$m"></p>
<p>Location:
<input type="integer" name="Location" value="$l"></p>
<input type="hidden" name="id" value="$id">
<p><input type="submit" value="Update"/>
<a href="index.php">Cancel</a></p>
</form>
_END
?>
