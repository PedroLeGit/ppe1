<?php
/**
 * Created by PhpStorm.
 * User: pplaud
 * Date: 25/01/2018
 * Time: 08:24
 */
?>
<h1>Creer un Chef de service</h1>
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
        <button type="submit" class="ui button">Valider creation</button> <p>Tous les champs sont requis</p>
    </form>
</div>