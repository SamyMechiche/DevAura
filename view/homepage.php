<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage | DevAura</title>
</head>
<body>
    <?php if(isset($_SESSION['name'])): ?>
        <h2>Bonjour <?= $_SESSION['name']; ?></h2>
    <?php endif; ?>

    <?php if(isset($_SESSION['name'])){ ?>
        <a href="<?= $router->generate('logout')?>">LOGOUT</a>
    <?php
    }
    ?>
        
</body>
</html>
