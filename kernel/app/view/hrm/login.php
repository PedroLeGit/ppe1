<?php
if(isset($error)){
    echo $error;}
?>

<div class="ui container">
    <?php
    //    debug($GLOBALS);
    ?>

    <h2>Se connecter</h2>
    <form class="ui form" method="post" action="<?php echo WEBROOT; ?>hrm/index">
        <div class="field">
            <label>Nom d'utilisateur</label>
            <input name="username"  type="text">
        </div>
        <div class="field">
            <label>Mot de passe</label>
            <input name="password" type="password">
        </div>
        <button class="ui button" type="submit">Se connecter</button>
    </form>
</div>
