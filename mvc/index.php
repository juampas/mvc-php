<?php

	// Funcion para carga de clases de manera automaticamente desde la carpeta "class"
	function __autoload($class_name) {
		global $path;
    	require_once $path."classes/".$class_name.".php";
	}
	
	// Clase que modela el uso de Template HTML
	$tpl = new TPL();
	
	// Informacion para completar el template con la logica de negocio
	$data['content'] = 'Hello World !!!';

	// Genera HTML para el browser , a partir de un archivo tpl en la carpeta "templates" ( body.tpl )
	echo $tpl->render('body',$data);

?>