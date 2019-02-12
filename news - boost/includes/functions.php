<?php 

require __DIR__.'/../config/dbconnect.php'; 

function fetchNews( $conn )
{

	$request = $conn->prepare(" SELECT id, titulo, desc_corto, autor, fecha,foto FROM noticias ORDER BY likes DESC ");
	return $request->execute() ? $request->fetchAll() : false; 
}
function fetchRecentNews( $conn )
{

	$request = $conn->prepare(" SELECT id, titulo, desc_corto, autor, fecha,foto FROM noticias ORDER BY fecha DESC ");
	return $request->execute() ? $request->fetchAll() : false; 
}


function getAnArticle( $id_article, $conn )
{

	$request =  $conn->prepare(" SELECT id,  titulo, desc_largo, autor, fecha ,foto FROM noticias  WHERE id = ? ");
	return $request->execute(array($id_article)) ? $request->fetchAll() : false; 
}


function getOtherArticles( $differ_id, $conn )
{
	$request =  $conn->prepare(" SELECT id,  titulo, desc_corto, desc_largo, autor, fecha FROM noticias  WHERE id != ? ");
	return $request->execute(array($differ_id)) ? $request->fetchAll() : false; 
}
 
 //this is for the sections mode
 //sports
 function fetchLikesNewsDeportes( $conn )
{

	$request = $conn->prepare(" SELECT id, titulo, desc_corto, autor, fecha,foto FROM noticias WHERE tipo = 'deportes' ORDER BY likes DESC ");
	return $request->execute() ? $request->fetchAll() : false; 
}

function fetchRecentNewsDeportes( $conn )
{

	$request = $conn->prepare(" SELECT id, titulo, desc_corto, autor, fecha,foto FROM noticias WHERE tipo = 'deportes' ORDER BY fecha DESC ");
	return $request->execute() ? $request->fetchAll() : false; 
}	
	//cullture
 function fetchLikesNewsCulture( $conn )
{

	$request = $conn->prepare(" SELECT id, titulo, desc_corto, autor, fecha,foto FROM noticias WHERE tipo = 'cultura' ORDER BY likes DESC ");
	return $request->execute() ? $request->fetchAll() : false; 
}

function fetchRecentNewsCulture( $conn )
{

	$request = $conn->prepare(" SELECT id, titulo, desc_corto, autor, fecha,foto FROM noticias WHERE tipo = 'cultura' ORDER BY fecha DESC ");
	return $request->execute() ? $request->fetchAll() : false; 
}	
	//science
 function fetchLikesNewsCiencia( $conn )
{

	$request = $conn->prepare(" SELECT id, titulo, desc_corto, autor, fecha,foto FROM noticias WHERE tipo = 'ciencia' ORDER BY likes DESC ");
	return $request->execute() ? $request->fetchAll() : false; 
}

function fetchRecentNewsCiencia( $conn )
{

	$request = $conn->prepare(" SELECT id, titulo, desc_corto, autor, fecha,foto FROM noticias WHERE tipo = 'ciencia' ORDER BY fecha DESC ");
	return $request->execute() ? $request->fetchAll() : false; 
}	
	
?>