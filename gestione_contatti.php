<?php

$connessione = mysqli_connect('localhost' , 'root' , ' ' , 'contatti');

// if($connessione){
//
//   echo "sei connesso";
// }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tabella utenti</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link href='style.css' rel='stylesheet' type='text/css'>

        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    </head>

    <body>
        <div class="container">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header bg-success">
                        Gestione degli iscritti
                    </h3>

                </div>
            </div>
            <!-- /.row -->
            <div class="row">

                <div class="col-sm-4">

                  <!-- Aggiungi iscritti -->

                <?php

if(isset($_POST['submit'])){

$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$mail = $_POST['email'];

$query = "INSERT INTO utenti (nome, cognome, email) VALUES  ('{$nome}' , '{$cognome}' , '{$mail}')";

$creaUtenti = mysqli_query($connessione , $query);

if(!$creaUtenti){

  die('Query fallita' . mysqli_error($connessione));
}

}              ?>

                    <form action="" method="post">
                        <h3>Aggiungi un iscritto</h3>

                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control"></div>

                        <div class="form-group">
                            <label for="cognome">Cognome</label>
                            <input type="text" name="cognome" class="form-control"></div>

                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" name="email" class="form-control"></div>

                        <div class="form-group">
                            <input type="submit" name="submit" value="Aggiungi" class="btn btn-success"></div>
                    </form>
<hr>


<!-- Modifica iscritto -->

<?php

if(isset($_GET['edit'])){

  $id = $_GET['edit'];

include "modifica-iscritto.php";
}

?>


                </div>

                <div class="col-sm-8">

                    <table class="table table-bordered table-hover">

                        <thead class="bg-success">
                            <tr>
                                <td>Id</td>
                                <td>Nome</td>
                                <td>Cognome</td>
                                <td>email</td>
                            </tr>
                        </thead>

                        <tbody>

<!-- Mostra gli utenti -->
<?php

$query = "SELECT * FROM utenti";

$mostraUtenti = mysqli_query($connessione , $query);

while ($row = mysqli_fetch_array($mostraUtenti)){

$id = $row['id'];
$nome = $row['nome'];
$cognome = $row['cognome'];
$mail = $row['email'];

echo "<tr>";

echo   "<td>{$id}</td>";
echo   "<td>{$nome}</td>";
echo   "<td>{$cognome}</td>";
echo   "<td>{$mail}</td>";

echo   "<td class='bg-danger'><span class='glyphicon glyphicon-remove-sign'></span><a href='gestione_contatti.php?delete={$id}'>Cancella</a></td>";

echo   "<td class='bg-success'><span class='glyphicon glyphicon-edit'></span><a href='gestione_contatti.php?edit={$id}'>Modifica</a></td>";

echo "</tr>";

}
?>

<!--  Cancella gli iscritti-->

<?php

if(isset($_GET['delete'])){

$utenteId = $_GET['delete'];

$query = "DELETE FROM utenti WHERE id = {$utenteId}";

$cancUtente = mysqli_query($connessione , $query);

header('Location: gestione_contatti.php');

}

?>




                          <!-- <tr>
                              <td>1</td>
                              <td>Mario</td>
                              <td>Rossi</td>
                              <td>mario@rossi.it</td>
                          </tr> -->

                        </tbody>
                    </table>
              </div>
                    </div>
        </div>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
