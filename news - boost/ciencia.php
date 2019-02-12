<?php require __DIR__.'../includes/functions.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Monumento</title>
  <meta http-equiv="Content-Type" content="text/html; charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  
   <img src="monumento.png" class="img-fluid" alt="Responsive image">
  <p>Noticias universitarias al instante</p> 
</div>



	  
<div class="container">
      

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Inicio</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
	
      <li class="nav-item active">
        <a class="nav-link" href="deportes.php">Deportes <span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item active">
        <a class="nav-link" href="cultura.php">Cultura <span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item active">
        <a class="nav-link" href="ciencia.php">Ciencia y Tecnologia <span class="sr-only">(current)</span></a>
      </li>
     
   
      
    </ul>
    
	
	<ul class="nav navbar-nav ml-auto">
  
      <li class="nav-item">
        <a class="nav-link" href="login.php"><span class="fas fa-sign-in-alt"></span> Login</a>
      </li>
    </ul>
	
	
  </div>
</nav>
<br>



		
		<h3 class="display-4 font-italic">Destacadas Ciencia</h3>
		<hr class="featurette-divider">
		
      <div class="row mb-2"><!-- we will obtain most like news  -->

			
			    <?php
				// get the database handler
				$dbh = connect_to_db(); // function created in dbconnect, remember?
				// Fecth news
				$news = fetchLikesNewsCiencia($dbh);
				?>

				<?php if ( $news && !empty($news) ) :?>

				<?php 
				$kakaroto=6;
				foreach ($news as $key => $article) :
				
				?>
				<div class="col-md-6">
				<div class="card flex-md-row mb-4 box-shadow h-md-250">
			<div class="card-body d-flex flex-column align-items-start">	
			<h3 class="mb-0">
              <strong class="text-dark"> <?= stripslashes($article->titulo) ?> </strong>
              </h3 >
              <div class="mb-1 text-muted"><?= date("M, jS") ?> por <?= stripslashes($article->autor) ?></div>
              <p class="card-text mb-auto"><?= stripslashes($article->desc_corto) ?>.</p>
              <a href="read-news.php?newsid=<?= $article->id ?>">Continuar leyendo</a>
			  </div>
			  <?php echo '<img style="width: 200px; height: 250px;" class="card-img-right flex-auto d-none d-md-block" src="data:image/jpeg;base64,'.base64_encode( $article->foto ).'"/>'; ?>
			  
          </div>				
			</div>
			

				<?php
				
				$kakaroto=$kakaroto-1;
				if($kakaroto==0)
				{
				break(1); 
				}
				endforeach?>

				<?php endif?>

      </div>
	  
	  
	  
      <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark"> <!-- we will obtain recent news :v -->
	  <h3 class="display-4 font-italic">Recientes</h3>
		<hr class="featurette-divider">
        			    <?php
				// get the database handler
				$dbh = connect_to_db(); // function created in dbconnect, remember?
				// Fecth news
				$news = fetchRecentNewsCiencia($dbh);
				?>

				<?php if ( $news && !empty($news) ) :?>

				<?php 
				$kakaroto=6;
				foreach ($news as $key => $article) :
				
				?>
				<div class="card">
					

					
					<a href="read-news.php?newsid=<?= $article->id ?>"><strong class="text-dark"> <?= stripslashes($article->titulo) ?> </strong></a>
					
					<div class="mb-1 text-muted"><?= date("M, jS") ?> por <?= stripslashes($article->autor) ?></div>
					<p class="mb-1 text-muted"><?= stripslashes($article->desc_corto) ?>.</p>
					



								
				</div>
			<br>

				<?php
				
				$kakaroto=$kakaroto-1;
				if($kakaroto==0)
				{
				break(1); 
				}
				endforeach?>

				<?php endif?>
      </div>
	  
	  
	  
<!-- Footer -->
<footer class="page-footer font-small teal pt-4">

    <!-- Footer Text -->
    <div class="container-fluid text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-6 mt-md-0 mt-3">

          <!-- Content -->
          <h5 class="text-uppercase font-weight-bold">Acerca de:</h5>
          <p>
		  Ubicamos en: zona central de la Ciudad de México, col. La Merced #23009
		  Telefonos : 45638339 ext 101 ,78,98
		  Correo: monumento@mex.com
		  Facebook: monumento_official
		  Twitter: NoticiasMonumento
		  </p>
        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none pb-3">

        <!-- Grid column -->
        <div class="col-md-6 mb-md-0 mb-3">

          <!-- Content -->
          <h5 class="text-uppercase font-weight-bold">Sobre este proyecto:</h5>
          <p> 
		  Nos encontramos con el proposito de mostrar noticias al alcance de todos los universitarios
		  con el fin de informar lo que pasa en el mundo actual conforme a distintas carreras , el cual ayuda
		  a estar informados sobre cualquier tipo de información por cualquier carrera.
		</p>
        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Text -->

    <!-- Copyright -->
		  Monumento© y NOTICIASnet© son marcas registradas de Editorial 
		  El Pino, S.A. de C.V. y/o una de sus empresas filiales. Todos los derechos
		  reservados®. Portal oficial del Grupo Noticias Monumento.
    </div>
    <!-- Copyright -->

  </footer>

	  
	  
    </div>

</body>
</html>
