<div class="ui container">
    <h1>Mon profil</h1>
    <div class="ui cards">

        <div class="card">
            <div class="content">
                Vos experiences
            </div>
            <?php
            foreach($experiences as $experience){

                ?>
                <div class="extra content">
                    <?php echo ucfirst($experience['label']);?>
                </div>
                <?php
            }
            ?>
        </div>




        <div class="card">
            <div class="content">
                Votre formation
            </div>
            <?php
            foreach($formations as $formation){

                ?>
                <div class="extra content">
                    <?php echo ucfirst($formation['label']);?>
                </div>
                <?php
            }
            ?>
        </div>


        <div class="card">
            <div class="content">
                Vos compétences
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
        </div>
    </div>


</div>
