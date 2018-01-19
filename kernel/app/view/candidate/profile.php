<div class="ui container">
    <h1>Mon profil</h1>
    <div class="ui special cards">
        <div class="card">
            <div class="content">
                <div class="header">
                    Vos informations personnelles
                </div>
            </div>
            <div class="content">
                Nom d'utilisateur : <span id="username"><?php echo $user['username'];?></span>
            </div>
            <div class="content">
                Nom : <span id="lastname"><?php echo $user['lastname'];?></span>
            </div>
            <div class="content">
                Prenom : <span id="firstname"><?php echo $user['firstname'];?></span>
            </div>
            <div class="content">
                Adresse mail : <span id="email"><?php echo $user['email'];?></span>
            </div>
            <div class="content">
                Adresse : <span id="address"><?php echo $user['address'];?></span>
            </div>
            <div class="content">
                Ville : <span id="city"><?php echo $user['city'];?></span>
            </div>
            <div class="content">
                Code postal : <span id="postalcode"><?php echo $user['postalcode'];?></span>
            </div>
            <div id="edit-user" class="ui bottom attached button">
                <i class="edit icon"></i>
                Editer
            </div>
        </div>
        <div class="card">
            <div class="content">
                <div class="header">
                    Vos experiences
                </div>
            </div>
            <?php
            foreach($experiences as $experience){

                ?>
                <div class="content ui form">
                    <span class="fields">
                        <span class="twelve wide field" id="exp<?php echo $experience['id_experience'];?>">
                            <?php echo $experience['label'];?>
                        </span>
                        <button  data-id="<?php echo $experience['id_experience'];?>" class="two wide field edit-exp ui icon button" tabindex="0">
                            <i id="exp-icon1-<?php echo $experience['id_experience'];?>" class="edit icon"></i>
                        </button >
                        <button  data-id="<?php echo $experience['id_experience'];?>" class="two wide field cancel-exp ui icon button" tabindex="0">
                            <i id="exp-icon2-<?php echo $experience['id_experience'];?>" class="trash icon"></i>
                        </button>
                    </span>
                </div>
                <?php
            }
            ?>
        </div>




        <div class="card">
            <div class="content">
                <div class="header">
                    Votre formation
                </div>
            </div>
            <?php
            foreach($formations as $formation){

                ?>
                <div class="content">
                    <?php echo ucfirst($formation['label']);?>
                </div>
                <?php
            }
            ?>
            <div class="ui bottom attached button">
                <i class="edit icon"></i>
                Editer
            </div>
        </div>


        <div class="card">
            <div class="content">
                <div class="header">
                    Vos compétences
                </div>
            </div>
            <?php
            foreach($skills as $skill){

            ?>
            <div class="content">
                <?php echo $levels[$skill['level']]." | ".ucwords($skill['skill']['label']);?>
            </div>
            <?php
            }
            ?>
            <div class="ui bottom attached button">
                <i class="edit icon"></i>
                Editer
            </div>
        </div>
    </div>
</div>



<div id="user" class="ui longer modal">
    <div class="header">Modifier vos information personnelles</div>
    <div class="scrolling content">
        <form class="ui form" method="post">
            <div class="field">
                <label>Nom</label>
                <input name="lastname" type="text" value="<?php echo $user['lastname'];?>" required>
            </div>
            <div class="field">
                <label>Prenom</label>
                <input name="firstname" type="text" value="<?php echo $user['firstname'];?>" required>
            </div>
            <div class="field">
                <label>Adresse mail</label>
                <input name="email" type="email" value="<?php echo $user['email'];?>" required>
            </div>
            <div class="field">
                <label>Adresse</label>
                <input name="address" type="text"  value="<?php echo $user['address'];?>" required>
            </div>
            <div class="field">
                <label>Ville</label>
                <input name="city" type="text" value="<?php echo $user['city'];?>" required>
            </div>
            <div class="field">
                <label>Code postal</label>
                <input name="postalcode" type="text" value="<?php echo $user['postalcode'];?>" required>
            </div>
        </form>
    </div>
    <div class="actions">
        <div id="edit-user-confirm" class="ui approve button">Enregistrer</div>
        <div class="ui cancel button">Retour</div>
    </div>
</div>

<div id="exp" class="ui longer modal">
    <div class="header">Modifier vos information personnelles</div>
    <div class="scrolling content">
        <form class="ui form" method="post">
            <div id="labelListExp" class="field">
            </div>
            <input name="nbExp" id="nbExp" type="hidden" value="0" >
            <button id="addLabelExp" type="button" class="ui inverted green button">+</button>
        </form>
    </div>
    <div class="actions">
        <div id="edit-user-confirm" class="ui approve button">Enregistrer</div>
        <div class="ui cancel button">Retour</div>
    </div>
</div>

<script>
    $("#edit-user").click(function () {
        getUserInfo();
    });
    $("#edit-user-confirm").click(function () {
        saveUserInfo();
    });
    function showEditUser() {
        $('#user.ui.longer.modal').modal('show');
    }

    function getUserInfo(){
        $.ajax({
            url: "<?php echo WEBROOT;?>api/candidate/<?php echo $_SESSION['id_candidate'];?>",
            success: function(result){
                if(result.length!= 0){
                    $("input[name=firstname]").val(result['firstname']);
                    $("input[name=lastname]").val(result['lastname']);
                    $("input[name=email]").val(result['email']);
                    $("input[name=address]").val(result['address']);
                    $("input[name=city]").val(result['city']);
                    $("input[name=postalcode]").val(result['postalcode']);
                    showEditUser();
                }else{

                }
            }});
    }
    function saveUserInfo(){
        $.ajax({
            url: "<?php echo WEBROOT;?>api/candidate/<?php echo $_SESSION['id_candidate'];?>",
            type : 'POST',
            data: 'lastname='+$('input[name=lastname]').val()+'&firstname='+$('input[name=firstname]').val()+'&email='+$('input[name=email]').val()+'&address='+$('input[name=address]').val()+'&city='+$('input[name=city]').val()+'&postalcode='+$('input[name=postalcode]').val(),
            success: function(result){
                $("#username").html(result['username']);
                $("#firstname").html(result['firstname']);
                $("#lastname").html(result['lastname']);
                $("#email").html(result['email']);
                $("#address").html(result['address']);
                $("#city").html(result['city']);
                $("#postalcode").html(result['postalcode']);
            }});
    }
    $(".edit-exp").click(function () {
        id = $(this).data('id');
        if($('#exp'+id).has("input").length != 0){
            saveExpInfo(id)
        }else{
            getExpInfo(id);
        }
    });
    $(".cancel-exp").click(function () {
        id = $(this).data('id');
        if($('#exp'+id).has("input").length != 0){
            cancelExpInfo(id);
        }else{

        }
    });

    function cancelExpInfo(id){
        $.ajax({
            url: "<?php echo WEBROOT;?>api/experienceById/"+id,
            success: function(result){
                $('#exp'+result['id_experience']).html(result['label']);
                $('#exp-icon1-'+result['id_experience']).removeClass("save");
                $('#exp-icon1-'+result['id_experience']).addClass("edit");

                $('#exp-icon2-'+result['id_experience']).removeClass("undo");
                $('#exp-icon2-'+result['id_experience']).addClass("trash");
            }
        });
    }
    function getExpInfo(id){
        $.ajax({
            url: "<?php echo WEBROOT;?>api/experienceById/"+id,
            success: function(result){
                $('#exp'+result['id_experience']).html("<input id='exp-input-"+result['id_experience']+"' type='text' value='"+result['label']+"' />");
                $('#exp-icon1-'+result['id_experience']).removeClass("edit");
                $('#exp-icon1-'+result['id_experience']).addClass("save");

                $('#exp-icon2-'+result['id_experience']).removeClass("trash");
                $('#exp-icon2-'+result['id_experience']).addClass("undo");
            }
        });
    }
    function saveExpInfo(id){
        $.ajax({
            url: "<?php echo WEBROOT;?>api/experienceById/"+id,
            type : 'POST',
            data: "label="+  $('#exp-input-'+id).val(),
            success: function(result){
                $('#exp'+result['id_experience']).html(result['label']);
                $('#exp-icon1-'+result['id_experience']).removeClass("save");
                $('#exp-icon1-'+result['id_experience']).addClass("edit");

                $('#exp-icon2-'+result['id_experience']).removeClass("undo");
                $('#exp-icon2-'+result['id_experience']).addClass("trash");
            }
        });
    }
    
</script>