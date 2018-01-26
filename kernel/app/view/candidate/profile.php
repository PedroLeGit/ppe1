<div class="ui container">
    <h1>Mon profil</h1>
    <div class="ui special cards">
        <div class="card">
            <div class="content">
                <div class="header">
                    Vos informations personnelles
                </div>
            </div>
            <div id="userList" class="content">

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
            <div id="experienceList" class="content ui form">

            </div>
            <div id="add-experience" class="ui bottom attached button">
                <i class="add icon"></i>
                Ajouter
            </div>
        </div>




        <div class="card">
            <div class="content">
                <div class="header">
                    Votre formation
                </div>
            </div>
            <div class="content">
            <?php
            foreach($formations as $formation){
                echo ucfirst($formation['label']);?>
                <div class="ui divider"></div>
                <?php
            }
            ?>
                </div>
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
            <div class="content">
            <?php
            foreach($skills as $skill){

                 echo $levels[$skill['level']]." | ".ucwords($skill['skill']['label']);?>
                <div class="ui divider"></div>
            <?php
            }
            ?>
            </div>
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

<div id="deleteExp" class="ui longer modal">
    <div class="header">Supprimer l'experience "<span id="expLabel"></span>"</div>
    <div class="actions">
        <div id="delete-exp-confirm" class="ui approve button">Enregistrer</div>
        <div class="ui cancel button">Retour</div>
    </div>
</div>
<div id="add-exp-modal" class="ui longer modal">
    <div class="header">Ajouter une experience </div>
    <div class="actions">
        <div class="ui form field">
            <input type="text" id="addExpInput"/>
        </div>
        <div id="add-exp-confirm" class="ui approve button">Ajouter</div>
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
        $("#add-experience").click(function () {
            $('#add-exp-modal.ui.longer.modal').modal('show');
        });
        $("#add-exp-confirm").click(function () {
           addExp();
        });
        function bindExp() {
            $(".edit-exp").click(function () {
                id = $(this).data('id');
                if ($('#exp' + id).has("input").length != 0) {
                    saveExpInfo(id)
                } else {
                    getExpInfo(id);
                }
            });
            $(".cancel-exp").click(function () {
                id = $(this).data('id');
                if ($('#exp' + id).has("input").length != 0) {
                    cancelExpInfo(id);
                } else {
                    deleteExpModal(id);
                }
            });
        }
        bindExp();
        $("#delete-exp-confirm").click(function () {
            deleteExp();
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
                refreshUser();
            }});
    }


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
    function deleteExpModal(id) {
        $.ajax({
            url: "<?php echo WEBROOT;?>api/experienceById/"+id,
            success: function(result){
                $('#expLabel').html(result['label']);
                $('#expLabel').data("idExp",result['id_experience'])
                $('#deleteExp.ui.longer.modal').modal('show');
            }
        });
    }
    function deleteExp() {
        $.ajax({
            url: "<?php echo WEBROOT;?>api/experienceById/"+id+"/delete",
            success: function(result){
                refreshExperience();
            }
        });
    }
    function refreshExperience(){
        $.ajax({
            url: "<?php echo WEBROOT;?>api/getExperiences",
            success: function(result){
                $('#experienceList').html(result);
                bindExp();
            }
        });
    }
    function refreshUser(){
        $.ajax({
            url: "<?php echo WEBROOT;?>api/getUserInfo",
            success: function(result){
                $('#userList').html(result);
            }
        });
    }
    function addExp() {
        $.ajax({
            url: "<?php echo WEBROOT;?>api/experience/<?php echo $_SESSION['id_candidate'];?>",
            data: "label="+$("#addExpInput").val(),
            success: function(result){
                refreshExperience();
            }
        });
    }
    refreshExperience();
    refreshUser();
</script>