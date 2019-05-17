<?php

/* nous permet juste d'include dans le head de l'index */
if(file_exists('./admin/lib/php/pgConnect.php')){
	require './admin/lib/php/pgConnect.php';
	require './admin/lib/php/autoload.php';
}
else if(file_exists('./lib/php/pgConnect.php')){
	require './lib/php/pgConnect.php';
	require './lib/php/autoload.php';
}