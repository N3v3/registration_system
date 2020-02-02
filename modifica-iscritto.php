<form action="" method="post">
    <h3>Modifica un iscritto</h3>

    <div class="form-group">
        <label for="nome">Aggiorna mail</label>

<?php

if(isset($_GET['edit'])){

$id = $_GET['edit'];

$query = "SELECT * FROM utenti WHERE id = $id ";

$utenteUpdate = mysqli_query($connessione , $query);

while($row = mysqli_fetch_assoc($utenteUpdate)){

$id =$row['id'];
$mail = $row['email'];

?>

<input  value='<?php if(isset($mail)){ echo $mail; } ?>'   type="text" name="mail" class="form-control"></div>

<?php }
}  ?>

<?php

if(isset($_POST['update'])){

$utenteAggiorna = $_POST['mail'];

$query = "UPDATE utenti SET email = '{$utenteAggiorna}'  WHERE id = {$id}";

$utenteUp = mysqli_query($connessione , $query);

}


?>

        <div class="form-group">
            <input type="submit" name="update" value="Aggiorna" class="btn btn-success"></div>
