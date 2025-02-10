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