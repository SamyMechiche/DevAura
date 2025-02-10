<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevAura</title>
</head>
<body>
    <section>
        <!-- Barre laterale pour le menu -->
         <ul>
            <li><!-- NOM DU USER --></li>
            <li><a href="/DevAura">Accueil</a></li>
            <li><a href="#">Explorer</a></li>
            <li><a href="#">Communautés</a></li>
            <li><a href="#">Messages</a></li>
            <li><a href="#">Tendances</a></li>
            <li><hr></li>
            <li><a href="#">Mes suivis</a></li>
            <li><a href="#">Confidentialité</a></li>
            <li><!-- CONNEXION / DECONNEXION --></li>
         </ul>
    </section>
    <section>
    <?php foreach($datas as $data): ?>
    <article class="subcategory">
       <figure><?=$data->getPicture();?></figure>
       <p><?=$data->getSubcategory_name();?></p>
       <p><?=$data->getDescription(); ?></p>
    </article>
    <?php endforeach; ?>
    </section>
</body>
</html>