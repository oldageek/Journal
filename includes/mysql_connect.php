<?php if (!isset($_SESSION)) {@session_start();}?>
<?php


//include('security.php');

/*
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_HOST','localhost');
define('DB_NAME','physics_journal');

*/

// define('DB_USER','mexilabc_hdez07');
// define('DB_PASSWORD','e}SmV!57pHRQ');
// define('DB_HOST','localhost');
// define('DB_NAME','mexilabc_fisicasystem');

define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_HOST','localhost');
define('DB_NAME','mexilabc_fisicasystem');


$dbc = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ('NO se pude conectar a MYSQL:' .mysqli_error() );

function escape_data ($data){

if(ini_get('magic_quotes_gpc')){
	$data = stripslashes($data);
}

global $dbc;
$data = mysqli_real_escape_string($dbc, trim($data));
return $data;
}

?>
