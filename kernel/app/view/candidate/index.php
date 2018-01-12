<div class="ui container">
    <form class="ui form" method="post">
<!--        <div class="inline fields">-->
<!--            <div class="field">-->
<!--                <div class="ui radio checkbox">-->
<!--                    <input name="type" checked="" type="radio">-->
<!--                    <label>DRH</label>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="field">-->
<!--                <div class="ui radio checkbox">-->
<!--                    <input name="type" type="radio">-->
<!--                    <label>CDS</label>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="field">-->
<!--                <div class="ui radio checkbox">-->
<!--                    <input name="type"  type="radio">-->
<!--                    <label>Candidat</label>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        <div class="field">
            <label>Nom d'utilisateur</label>
            <input name="user" type="text">
        </div>
        <div class="field">
            <label>Mot de passe</label>
            <input name="password" type="password">
        </div>
        <button class="ui button" type="submit">Se connecter</button><a href="<?php echo WEBROOT;?>candidate/register">S'inscrire</a>
    </form>
</div>