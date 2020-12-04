<?php
# CONNESSIONE AL DATABASE

# Parametri: host, utente, password, database
$connessione = mysqli_connect('localhost' , 'root' , '' , 'contatti');

# Verifichiamo se la connessione è andata a buon fine
if($connessione){
    echo "Connessione stabilita";
}
?>



<?php
# REGISTRAZIONE NEL DB DEI DATI CHE PROVENGONO DAL FORM DELL'HTML SOTTOSTANTE

$avviso = "";   # Vogliamo stampare qua il contenuto della variabile $avviso, che definiremo successivamente

if(isset($_POST['submit'])){   # Quando l'utente invia il modulo (con il metodo POST)
    $nome = $_POST['nome'];   # Salviamo i valori recuperati in variabili (per comodità)
    $cognome = $_POST['cognome'];
    $mail = $_POST['email'];

    if(!empty($nome) && !empty($cognome) && !empty($mail)){   # Se nessuno dei tre campi è vuoto
        $query = "INSERT INTO utenti(nome,cognome,email) VALUES ('{$nome}','{$cognome}','{$mail}')";   # Inseriamo i valori nel db
        $creaUtenti = mysqli_query($connessione,$query);   # Variabile che controlla la connessione e la query

        if(!$creaUtenti){ # Se la connessione non riesce
            die('Query fallita. Codice d\'errore: ' . mysqli_error($connessione));   # Stampa il codice d'errore e chiude tutto
        }

        $avviso = "Dati registrati con successo"; # Se la connessione riesce
        //echo $avviso; # Commentato perché abbiamo preferito stampare l'avviso in alto nella pagina
    } else {
        $avviso = "I campi non devono essere vuoti"; # Se qualche campo è vuoto
        //echo $avviso;
    }

}
?>



<!-- CODICE HTML -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>Form di registrazione</title>

    	<!-- CSS Minifier -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Collegamento CSS -->
		<link href='style.css' rel='stylesheet' type='text/css'>

		<!-- Collegamento a Google fonts -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	</head>

  	<body>
		<div class="container-fluid">
			<h2>Lascia i tuoi dati</h2>
    		<form action="form_registrazione.php" method="POST" class="register-form">
			<h4><?php echo $avviso; ?></h4>   <!-- Vogliamo stampare qua $avviso -->
    		<div class="row">
        		<div class="col-md-3 col-sm-3 col-lg-3">
					<label for="nome">NOME</label>
               		<input name="nome" class="form-control" type="text" placeholder="Nome">
           		</div>
      		</div>
        	<div class="row">
          		<div class="col-md-3 col-sm-3 col-lg-3">
              		<label for="cognome">COGNOME</label>
               		<input name="cognome" class="form-control" type="text" placeholder="Cognome">
           		</div>
			</div>
			<div class="row">
           		<div class="col-md-3 col-sm-3 col-lg-3">
              		<label for="email">EMAIL</label>
               		<input name="email" class="form-control" type="email" placeholder="Email">
           		</div>
      		</div>
			<hr>
      		<div class="row">
           		<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
           			<button class="btn btn-default regbutton" name="submit">Registrati</button>
				</div>
    		</form>
		</div>

	<!-- Collegamento a jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
    <!-- JavaScript Minifier -->
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  
	</body>
</html>
