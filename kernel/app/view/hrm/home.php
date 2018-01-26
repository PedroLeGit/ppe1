<div class="ui container">
<h2>Accueil</h2> <br />
    <!--test useless-->

    <h3><?php echo ("Bonjour ".$_SESSION['firstname']);?></h3>
<br />
<a href="<?php echo WEBROOT; ?>hrm/create_department">Gestion Services</a> <br/>
<a href="<?php echo WEBROOT; ?>hrm/create_sm">Creer compte CDS</a> <br/>
<a href="<?php echo WEBROOT; ?>hrm/check_offer">Consulter offres</a>
<br />
<br />
<a href="<?php echo WEBROOT; ?>hrm/logout">Deconnexion</a>
<br />
</div>