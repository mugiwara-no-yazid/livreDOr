<div class="form">
    <form action="#" method="post">
        <div>
            <label for="pseudo">Entrez votre pseudo :</label>
            <input type="text" name="pseudo" id="pseudo">
        </div>
            <?php if ($tabError["username"])
            {
            ?>
            <div class="erreur">
                <?=$tabError["username"] ?>
            </div>
            <?php
            }?>
            <label for="mssge">Entrez votre message :</label>
            <textarea name="mssge" id="mssge"></textarea>
            <?php if ($tabError["message"])
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