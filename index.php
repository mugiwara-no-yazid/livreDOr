<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . "inclus" . DIRECTORY_SEPARATOR ."head.php";
require_once __DIR__ .DIRECTORY_SEPARATOR ."class" . DIRECTORY_SEPARATOR ."Message.php";
require_once __DIR__ .DIRECTORY_SEPARATOR ."class" . DIRECTORY_SEPARATOR ."LivreDOr.php";
$file = __DIR__ . DIRECTORY_SEPARATOR . "fichiers" .DIRECTORY_SEPARATOR . "messages.txt";
$livreDor = new LivreDOr($file);
if (!empty($_POST))
{
    $message = new Message($_POST["pseudo"],$_POST["mssge"],time());
   if (!$message->isValid())
   {
?>
    <h2>Formulaire invalide</h2>
<?php
    $tabError = $message->getError();
   }
   else{    
?>
    <h2>Votre message a ete envoyer</h2>
<?php  
   
    $livreDor-> addMessage($message);
    $_POST = [];
   }
}
?>
<h1>LIVRE D'OR</h1>

<div class="form">
    <form action="#" method="post">
        <div>
            <label for="pseudo">Entrez votre pseudo :</label>
            <input type="text" name="pseudo" id="pseudo" <?php if(isset($_POST['pseudo'])) :?>value="<?=htmlentities($_POST['pseudo'])?>"<?php endif?>>
        </div>
        <?php if (isset( $tabError["username"]))
            {
            ?>
            <div class="erreur">
                <?=$tabError["username"] ?>
            </div>
            <?php
            }?>
           
            <label for="mssge">Entrez votre message :</label>
            <textarea name="mssge" id="mssge"><?php if(isset($_POST['mssge'])) :?><?=htmlentities($_POST['mssge'])?><?php endif?></textarea>
            <?php if (isset($tabError["message"]))
            {
            ?>
            <div class="erreur">
                <?= $tabError["message"] ?>
            </div>
            <?php
            }?>
       <button type="submit">Envoyer</button>
    </form>
</div>

<h1>Vos messages : </h1>
<div>
    <?php
    $tabmessage = $livreDor->getMessage();
    foreach($tabmessage as $mess)
    {
        $affiche = Message::fromJson($mess);
        echo ($affiche ->toHtml());
    }
    
    ?>
</div>
<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . "inclus" . DIRECTORY_SEPARATOR ."foot.php";

?>