<?php require __DIR__.'../includes/functions.php' ?>
<html>
<head>
  <title>Monumento</title>
  <meta charset="utf-8">
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




   

        <div class="container marketing">
		
		<hr class="featurette-divider">

            <div class="news">
				<div class="row featurette">
                <?php
                    
					
                    $dbh = connect_to_db(); // function created in dbconnect

                    $id_article = (int)$_GET['newsid'];

                    if ( !empty($id_article) && $id_article > 0) {
                        // Fecth news
                        $article = getAnArticle( $id_article, $dbh );
                        $article = $article[0];
                    }else{
                        $article = false;
                        echo "<strong>Wrong article!</strong>";
                    }

                    $other_articles = getOtherArticles( $id_article, $dbh );

                ?>

                <?php if ( $article && !empty($article) ) :?>
				
				
				<div class="col-md-7">
            <h2 class="featurette-heading">			
			<?= stripslashes($article->titulo) ?> <br>
			<span class="text-muted">published on <?= date("M, j  Y, H:i", $article->fecha) ?> by <?= stripslashes($article->autor) ?></span>
			</h2>
            <p class="lead"><?= stripslashes($article->desc_largo) ?>.</p>
          </div>
				
             
         
				
				<div class="col-md-5">
<?php echo '<img class="featurette-image img-fluid mx-auto" alt="500x500" style="width: 500px; height: 500px;" data-holder-rendered="true"  src="data:image/jpeg;base64,'.base64_encode( $article->foto ).'"/>'; ?>
            
          </div>
				
				
            <?php else:?>

                <?php endif?>
			
            </div>
			</div>

			
			
			

            <hr>
            <h1>Otros Articulos</h1>
            <div class="similar-posts">
                <?php if ( $other_articles && !empty($other_articles) ) :?>

                <?php foreach ($other_articles as $key => $article) :?>
                <h2><a href="read-news.php?newsid=<?= $article->id ?>"><?= stripslashes($article->titulo) ?></a></h2>
                <p><?= stripslashes($article->desc_corto) ?></p>
                <span>published on <?= date("M, jS  Y, H:i", $article->fecha) ?> by <?= stripslashes($article->autor) ?></span>
                <?php endforeach?>

                <?php endif?>

            </div>

			
			
			<hr class="featurette-divider">
					
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