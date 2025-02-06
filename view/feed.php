<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevAura</title>
</head>
<body>
<h2>Publications</h2>
<?php foreach($datas as $data): ?>
    <article class="post">
       <h2><?=$data->name ;?></h2>
       <p><?=$data->post->getPublished_date()->format('d/m/Y');?></p>
       <figure><?=$data->post->getPost_picture();?></figure>
       <p><?=$data->post->getContent(); ?></p>
    </article>
    <?php endforeach; ?>
</body>
</html>