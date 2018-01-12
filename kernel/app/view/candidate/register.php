<div class="ui container">
<?php
if(isset($_SESSION['register_finished']) && !$_SESSION['register_finished']){
    debug($_SESSION);
?>
    <form class="ui form" method="post">
        <div id="labelList" class="field">
            <div class="field">
                <input name="0" type="text" maxlength="100" required>
            </div>
        </div>
        <input name="nbLabel" id="nbLabel" type="hidden" value="0" >
        <button id="addLabel" type="button" class="ui inverted green button">+</button>
        <button class="ui button" type="submit" >Valider</button>
    </form>
    <script>
        $( "#addLabel" ).click(function() {
            var nb = $( "#nbLabel" ).val();
            var text = $( "input[name='"+nb+"']").val();
            console.log(nb+text);
            if(text != ""){
                var newnb = parseInt(nb)+1;
                $( "#labelList" ).append('<div class="field">\n' +
                    '                <input name="'+newnb+'" type="text" maxlength="100" required>\n' +
                    '            </div>');
                $( "#nbLabel" ).val(newnb);
            }
        });
    </script>
    <?php
}else {
    ?>



        <form class="ui form" method="post">
            <div class="field">
                <label>Nom d'utilisateur</label>
                <input name="username" type="text" required>
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
            <button id="registerButton" class="ui button" type="submit" disabled="true">Se connecter</button>
        </form>

    <script>
        function passwordVerif() {
            if ($('#password1').val() == $('#password2').val()) {
                $("#registerButton").prop("disabled", false);
            } else {
                $("#registerButton").prop("disabled", true);
            }
        }

        $("#password1").keyup(function () {
            passwordVerif();
        });
        $("#password2").keyup(function () {
            passwordVerif();
        });
    </script>
    <?php
}
    ?>
</div>
