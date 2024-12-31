<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . "inclus" . DIRECTORY_SEPARATOR ."head.php";
if (!empty($_REQUEST))
{
   if (mb_strlen($_REQUEST["pseudo"],"UTF-8")<3 || mb_strlen($_REQUEST["mssge"],"UTF-8")<10)
   {
?>
    <h2>Votre pseudo doit avoir plus de 3 characteres et votre message plus de 10 characteres</h2>
<?php
   }
   else{
?>
    <h2>Votre message a ete envoyer</h2>
<?php  
    $tabMessage = [
                    'username' => $_REQUEST['pseudo'],
                    'message' => $_REQUEST['mssge'],
                    'date'=> time()
    ];
    $file = __DIR__ . DIRECTORY_SEPARATOR . "fichiers" .DIRECTORY_SEPARATOR . "messages.txt";
    if(!file_exists($file))
    {
        $resource  = fopen($file,'x+');
    }
    else
    {
        $resource = fopen($file,'a');
    }
    fwrite($resource,json_encode($tabMessage)."\n");
    fclose($resource);
   }
}
?>
<h1>LIVRE D'OR</h1>

<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . "inclus" . DIRECTORY_SEPARATOR ."form.php";
?>
<h1>Vos messages : </h1>
<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . "inclus" . DIRECTORY_SEPARATOR ."foot.php";

?>