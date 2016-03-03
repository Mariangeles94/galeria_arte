 <?php

session_start();
require_once '../../clases/Google/autoload.php';
$cliente = new Google_Client();
$cliente->setApplicationName('ProyectoEnviarCorreoGmail');
$cliente->setClientId('628244456811-ttpsl5j7hqocrubipifrb38stvurfuk5.apps.googleusercontent.com');
$cliente->setClientSecret('Bfy_BJa0ctfm7kv2WwZOJp8l');
//$cliente->setRedirectUri('https://podcast-mariangeles94.c9users.io/correo/oauth/guardar.php');
$cliente->setRedirectUri('https://localhost:8008/Gestion/correo/oauth/guardar.php');
$cliente->setScopes('https://www.googleapis.com/auth/gmail.compose');
$cliente->setAccessType('offline');

if (isset($_GET['code'])) {
   $cliente->authenticate($_GET['code']);

   $_SESSION['token'] = $cliente->getAccessToken();

   $archivo = "token.conf";

   $fh = fopen($archivo, 'w') or die("error");

   fwrite($fh, $cliente->getAccessToken()); //almacenamiento del token

   fclose($fh);

}