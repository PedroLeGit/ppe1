<div class="ui container">
    <?php
//    debug($GLOBALS);
    ?>
    <form class="ui form" method="post">
        <div class="field">
            <label>Nom d'utilisateur</label>
            <input name="username" value="<?php if($lastUsername){echo $lastUsername;}?>" type="text">
        </div>
        <div class="field">
            <label>Mot de passe</label>
            <input name="password" type="password">
        </div>
        <button class="ui button" type="submit">Se connecter</button><a href="<?php echo WEBROOT;?>candidate/register">S'inscrire</a>
    </form>
</div>