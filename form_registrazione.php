<?php

$connessione = mysqli_connect('localhost' , 'root' , ' ' , 'contatti');

if($connessione){

  echo "sei connesso";
}
?>

<?php

$avviso = "";


if(isset($_POST['submit'])){

$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$mail = $_POST['email'];

if(!empty($nome) &&  !empty($cognome) && !empty($mail)){

$query = "INSERT INTO utenti (nome, cognome, email) VALUES ('{$nome}' , '{$cognome}' , '{$mail}')";

$creaUtenti = mysqli_query($connessione , $query);

if(!$creaUtenti){

  die('Query fallita' . mysqli_error($connessione));
}

$avviso = "Dati registrati con successo";
//echo $avviso;
}else{

  $avviso = "I campi non devono essere vuoti";
  //echo $avviso;
}

}


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form di registrazione</title>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link href='style.css' rel='stylesheet' type='text/css'>

<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  </head>

  <body

<div class="container-fluid">
<h2>Lascia i tuoi dati</h2>
    <form action="form_registrazione.php" method="post" class="register-form">

<h4><?php echo $avviso; ?></h4>
      <div class="row">
           <div class="col-md-3 col-sm-3 col-lg-3">

              <label for="nome">NOME</label>
               <input name="nome" class="form-control" type="text">
           </div>
      </div>
        <div class="row">
          <div class="col-md-3 col-sm-3 col-lg-3">
              <label for="cognome">COGNOME</label>
               <input name="cognome" class="form-control" type="text">
           </div>
        </div>

      <div class="row">
           <div class="col-md-3 col-sm-3 col-lg-3">
              <label for="email">EMAIL</label>
               <input name="email" class="form-control" type="email">
           </div>
      </div>

      <hr>
      <div class="row">
           <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
           <button class="btn btn-default regbutton" name="submit">Registrati</button>


      </div>
    </form>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>
