<!DOCTYPE html>
<html lang='en'>
  <head>
  
    <meta charset='UTF-8'/>
    <title>Formulario</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	
	
  </head>
  <body>
	<?php
			$servername = "localhost";
			$username = "root";
			$password = "";

			try {
			$conn = new PDO("mysql:host=$servername;dbname=monumento", $username, $password);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			
			}
			catch(PDOException $e)
			{
			echo "Connection failed: " . $e->getMessage();
			}
	
		

			
		
		$usero = ($_REQUEST['user']);
		$pass = ($_REQUEST['pass']);

		
	
		
	
		
			
				
		$stmt = $conn->prepare("SELECT id FROM persona WHERE userdb = \"$usero\"");
		$stmt->execute([$usero]); 
		$user = $stmt->fetch();
		$conn=null;	

?>
<?php
		 if($user[0]==null):
		 
			 echo "Error al procesar usuario (DB usuario no existe)";
			 echo "<a href=\"http://localhost/news%20-%20boost/login.php \" >Regresar</a>";
		 
		 else:
		 
	 //turn page a bostrap page
	 ?>
	 
	 <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="sources/monumento_ico.png" alt="" width="72" height="72">
        <h2>Agregar noticia</h2>
        <p class="lead">Agrege los campos.</p>
      </div>

      <div class="row">
        
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Noticia</h4>
          <form class="needs-validation" novalidate="">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Tiulo de la noticia</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valido titulo requerido.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Descripcion Corta</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valido descripcion requerido
                </div>
              </div>
			  
			  <div class="col-md-6 mb-3">
                <label for="lastName">Descripcion larga</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valido descripcion requerido
                </div>
              </div>
			  
			  <div class="col-md-6 mb-3">
                <label for="lastName">Tipo</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valido tipo requerido
                </div>
              </div>
			  
			  
            </div>

            
            <button class="btn btn-primary btn-lg btn-block" type="submit">Agregar</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© 2017-2018 Monumento</p>
        <ul class="list-inline">
          <li class="list-inline-item"></li>
          
          
        </ul>
      </footer>
    </div>
	 
	 
	
	 
	 
	 
	
	 
	 <?php endif?> 
 


	
		
	
		
	
	<br>
	<br>
	<br>

	
	
  </body>
</html>
