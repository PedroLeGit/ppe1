<div class="ui container">
    <h1>Mon profil</h1>
    <div class="ui special cards">
        <?php
        var_dump($user);
        ?>

        <div class="card">
            <div class="content">
                <div class="header">
                    Vos informations personnelles
                </div>
            </div>
            <div class="content">

            </div>
            <div class="ui bottom attached button">
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
                <div class="content">
                    <?php echo ucfirst($experience['label']);?>
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
            <div class="extra content">
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