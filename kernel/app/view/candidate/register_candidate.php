    <h2>Informations personnelles</h2>
    <style>
        .usernameOk:after{
            color:green;
            content: " Nom d'utilisateur disponible";
        }
        .usernameNOk:after{
            color:red;
            content: " Nom d'utilisateur indisponible";
        }
    </style>
        <form class="ui form" method="post" action="<?php echo WEBROOT;?>candidate/register">
            <div class="field">
                <label id="usernameLabel">Nom d'utilisateur</label>
                <input id="username" name="username" type="text" required>
            </div>
            <div class="field">
                <label>Nom</label>
                <input name="lastname" type="text" required>
            </div>
            <div class="field">
                <label>Prenom</label>
                <input name="firstname" type="text" required>
            </div>
            <div class="field">
                <label>Adresse mail</label>
                <input name="email" type="email" required>
            </div>
            <div class="field">
                <label>Adresse</label>
                <input name="address" type="text" required>
            </div>
            <div class="field">
                <label>Ville</label>
                <input name="city" type="text" required>
            </div>
            <div class="field">
                <label>Code postal</label>
                <input name="postalcode" type="text" required>
            </div>
            <div class="field">
                <label>Mot de passe</label>
                <input id="password1" name="password" type="password" required>
            </div>
            <div class="field">
                <label>Encore le mot de passe</label>
                <input id="password2" type="password">
            </div>
            <button id="registerButton" class="ui button" type="submit" disabled="true">S'inscrire</button>
        </form>

    <script>
        password = false;
        username = false;
        function passwordVerif() {
            if ($('#password1').val() == $('#password2').val()) {
                window.password = true;
            } else {
                window.password = false;
            }
        }
        function checkUsername(username){
            $.ajax({
                url: "<?php echo WEBROOT;?>api/candidateUsername/"+username+"/1",
                success: function(result){
                    if(result['items'].length== 0){
                        window.username = true;
                        $("#usernameLabel").removeClass("usernameNOk");
                        $("#usernameLabel").addClass("usernameOk");
                    }else{
                        window.username = false;
                        $("#usernameLabel").removeClass("usernameOk");
                        $("#usernameLabel").addClass("usernameNOk");
                    }
                    checkAll();
                }});
        }
        function checkAll(){
            if(window.password && window.username){
                $("#registerButton").prop("disabled", false);
            }else{
                $("#registerButton").prop("disabled", true);
            }
        }
        $("#password1").keyup(function () {
            passwordVerif();
            checkAll();
        });
        $("#password2").keyup(function () {
            passwordVerif();
            checkAll();
        });
        $("#username").keyup(function () {
            checkUsername($(this).val());
        });
    </script>