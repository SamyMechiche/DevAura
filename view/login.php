<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | DevAura</title>
</head>

<body>
    <?php if (isset($error)): ?>
        <p><?= $error; ?></p>
    <?php endif ?>

    <form action="/DevAura/login" method="POST">
        <input type="hidden" name="form_type" value="login">
        <div>
            <label for="mail">Votre email: </label>
            <input type="email" name="mail" id="mail" required>
        </div>
        <div>
            <label for="pass">Votre mot de passe: </label>
            <input type="password" name="pass" id="pass" required>
        </div>
        <div>
            <input type="submit" name="submit" value="Je me connecte">
        </div>
    </form>

    <form action="/DevAura/login" method="POST">
        <input type="hidden" name="form_type" value="signing">
        <div>
            <label for="name">Votre nom: </label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="email">Votre email: </label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="password">Votre mot de passe: </label>
            <input type="password" name="password" id="password">
        </div>
        <input type="submit" name="submit" value="Je m'inscris">
        </div>
    </form>
</body>

</html>