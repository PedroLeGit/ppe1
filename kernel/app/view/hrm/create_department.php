<br />
<div class="ui container">
<?php
if(isset($error)){
?><br /><style type="text/css">p{color: red;}</style><p><?php echo $error;}

    if(isset($success)){
    ?><br /><style type="text/css">p{color: green;}</style><p><?php echo $success;}
    ?></p>

<h1>Creer un Service</h1>
<br />

<div class="ui container">
    <form action="" class="ui form" method="post">
        <div class="field">
            <label for="">Service</label>
            <input type="text" name="label" required/>
        </div>
        <div class="field">
            <label for="">Effectif</label>
            <input type="number" name="staff" required/>
        </div>
        <button type="submit" class="ui button">Valider creation</button> Tous les champs sont requis
    </form>
</div>
<br />
<a href="<?php echo WEBROOT; ?>hrm/home"> Retour accueil</a>
</div>
<br />
<br />
<br />
<br />

