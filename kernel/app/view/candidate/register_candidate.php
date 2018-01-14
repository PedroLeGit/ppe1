    <h2>Informations personnelles</h2>
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
            <button id="registerButton" class="ui button" type="submit" disabled="true">S'inscrire</button>
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