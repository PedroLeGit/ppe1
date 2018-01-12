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
        <?php echo $content_for_layout; ?>
    </body>
</html>