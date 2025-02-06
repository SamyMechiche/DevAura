<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | DevAura</title>
</head>
<body>
    <?php if(isset($error)):?>
        <p><?= $error; ?></p>
    <?php endif?>
    
    <form action="/DevAura/login" method="POST">
        <div>            
            <label for="email">Votre email: </label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>            
            <label for="pwd">Votre mot de passe: </label>
            <input type="password" name="pwd" id="pwd" required>
        </div>
        </div>
            <input type="submit" name="submit" value="Je me connecte">
        </div>
    </form>
</body>
</html>