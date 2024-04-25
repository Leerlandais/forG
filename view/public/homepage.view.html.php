<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Accueil</h1>
    <nav>
        <ul>
            <li><a href="./">Accueil</a></li>
            <li><a href="?json" target="_blank">API</a> format JSON</li>
            <li><a href="?connect">Connexion</a>
        </ul>
    </nav>
    <div id="content">
        <h3>Liste de nos lieux</h3>
        <?php
        
        if(is_string($ourDatas)):
        ?>
            <h3 id="alert"><?=$ourDatas?></h3>
        <?php
        
        elseif(empty($ourDatas)):
        ?>
            <h3 id="comment">Pas encore de lieu.</h3>
        <?php
        
        else:

            $nb = count($ourDatas);
        ?>
            <h3>Il y a <?=$nb?> <?=$nb>1 ? "lieux" : "lieu"?></h3>

            <?php
            foreach($ourDatas as $data):
            ?>
            <h4><?=$data['title']?></h4>
            <p><?=$data['ourdesc']?></p>
            <p><?=$data['latitude']?> | <?=$data['longitude']?></p>
            <hr>
        <?php
            endforeach;
        endif;
        ?>   
    </div>
</body>
</html>