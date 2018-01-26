<!--affichage des erreurs/succes-->
<br />
<div class="ui container">
    <?php
    if(isset($error)){
    ?><br /><style type="text/css">p{color: red;}</style><p><?php echo $error;}
        if(isset($success)){
        ?><br /><style type="text/css">p{color: green;}</style><p><?php echo $success;}
        ?></p>

    <div class="ui grid">
        <div class="height wide column"><h1>Creer un Chef de Service</h1></div>
        <div class="height wide column"><h1>Gerer les CDS</h1></div>


    <!--formulaire-->

    <a href="<?php echo WEBROOT;?> hrm/delete_department">
        <i style="font-size: 17px;" class="edit icon">
            <h4>Supprimer_un_Chef_De_Service</h4>
        </i>
    </a>
    <br />
<br />
        <div class="ui container">
            <form action="" class="ui form" method="post">
                <div class="field">
                    <label for="">Utilisateur</label>
                    <input type="text" name="username" required/>
                </div>
                <div class="field">
                    <label for="">Nom</label>
                    <input type="text" name="lastname" required/>
                </div>
                <div class="field">
                    <label for="">Prenom</label>
                    <input type="text" name="firstname" required/>
                </div>
                <div class="field">
                    <label for="">Email</label>
                    <input type="email" name="email"  required/>
                </div>
                <div class="field">
                    <label for="">Adresse</label>
                    <input type="text" name="address" required/>
                </div>
                <div class="field">
                    <label for="">Ville</label>
                    <input type="text" name="city" required/>
                </div>
                <div class="field">
                    <label for="">Code Postal</label>
                    <input type="number" name="postalcode" required/>
                </div>
                <div class="field">
                    <label for="">Service</label>
                    <input type="text" name="department" required/>
                </div>
                <div class="field">
                    <label for="">Mot de passe par defaut pour Chef de Service</label>
                    <input id="password1" type="password" name="password" required/>
                </div>
                <div class="field">
                    <label for="">Confirmez ce mot de passe</label>
                    <input id="password2" type="password" required/>
                </div>
                <button type="submit" class="ui button">Valider creation</button> <p>Tous les champs sont requis</p>
            </form>
        </div>
        <a href="<?php echo WEBROOT; ?>hrm/home"> Retour accueil</a>
    </div>
</div>
<br />
<br />
<br />
<br />