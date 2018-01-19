<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="<?php echo WEBROOT;?>semantic/semantic.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="<?php echo WEBROOT;?>semantic/semantic.min.js"></script>
    <title><?php if(!$metaTitle){echo "Recrutement";}else{echo $metaTitle;}?></title>
</head>
<body>
    <div class="ui container">
        <h1>Inscription</h1>
        <div class="ui ordered steps">
            <div class="<?php if($step == 1){ echo "active";}elseif($step > 1){echo "completed";} ?> step">
                <div class="content">
                    <div class="title">Informations personnelles</div>
                </div>
            </div>
            <div class="<?php if($step == 2){ echo "active";}elseif($step > 2){echo "completed";} ?> step">
                <div class="content">
                    <div class="title">Experiences</div>
                </div>
            </div>
            <div class="<?php if($step == 3){ echo "active";}elseif($step > 3){echo "completed";} ?> step">
                <div class="content">
                    <div class="title">Formation</div>
                </div>
            </div>
            <div class="<?php if($step == 4){ echo "active";}elseif($step > 4){echo "completed";} ?> step">
                <div class="content">
                    <div class="title">Competences</div>
                </div>
            </div>
        </div>
        <noscript>Veuillez activer JavaScript</noscript>
        <?php echo $content_for_layout; ?>
    </div>
</body>
</html>