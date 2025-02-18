<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="asset\CSS\style.css">
    <title>Login | DevAura</title>
</head>

<body>

    <main class="container">
        <?php if (isset($error)): ?>
            <p><?= $error; ?></p>
        <?php endif ?>

        <!-- Formulaire de Connexion -->        
        <div class="form-container login">
            <form action="/DevAura/login" method="POST">
                <input type="hidden" name="form_type" value="login">
                <h2 class="title-log" >Connexion</h2>
                <div>
                    <input type="email" name="mail" id="mail" placeholder="E-mail" required>
                </div>
                <div>
                    <input type="password" name="pass" id="pass" placeholder="Mot de passe" required>
                </div>
                <input class="log-button" type="submit" name="submit" value="Se connecter">
                <p><a href="#">Mot de passe oublié</a></p>
            </form>
        </div>

        <!-- SVG Bouton (Slider) -->
        <div class="slider">
            <img src="asset/uploads/Rectangle.svg" alt="Changer de formulaire">
            <p class="marque-slider" >DevAura</p>
            <p class="txt-slider" >Rejoignez la communauté<br> de developpeurs passionnés</p>
            <button id="toggleButton">Je m'inscris →</button>
        </div>

        <!-- Formulaire d'Inscription -->        
        <div class="form-container signup">
            <form action="/DevAura/login" method="POST">
                <input type="hidden" name="form_type" value="signing">
                <h2 class="title-log">Inscription</h2>
                <div>
                    <input type="text" name="name" id="name" placeholder="Nom">
                </div>
                <div>
                    <input type="email" name="email" id="email" placeholder="E-mail">
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder="Mot de passe">
                </div>
                <input class="log-button" type="submit" name="submit" value="Je m'inscris">
            </form>
        </div>
    </main>
    <script src="./asset/js/login.js"></script>
    <script src="./asset/js/main.js"></script>
</body>

</html>