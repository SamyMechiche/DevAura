<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./asset/css/style.css">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>DevAura</title>
</head>

<body class="flex-between">

    <section class="mr-2 row-limit-size position">
        <!-- Barre laterale pour le menu -->
        <ul>
            <li class="mb-4"><a class="logo" href="/DevAura"> &lt;DevAura&gt;</a></li>
            <li class="mb-2"><button class="toggle-button switch"><i class="fas fa-adjust"></i> </button></li>
            <li class="mb-4"> <?php if (isset($_SESSION['name'])): ?>
                    <h2>Bonjour <?= $_SESSION['name']; ?></h2>
                <?php else: ?>
                    <a href="<?= $router->generate('login') ?>"><i class="fa-solid fa-right-to-bracket"></i>Connexion</a>
                <?php endif; ?>
            </li>
            <li class="mb-4"><a href="/DevAura"><i class="fa-solid fa-house"></i> Accueil</a></li>
            <li class="mb-4"><a href="./feed"><i class="fa-solid fa-compass"></i> Explorer</a></li>
            <li class="mb-4"><a href="#"><i class="fa-solid fa-user-group"></i> Communauté</a></li>
            <li class="mb-4"><a href="#"><i class="fa-solid fa-message"></i> Messages</a></li>
            <li class="mb-4"><a href="#"><i class="fa-solid fa-bolt"></i> Tendances</a></li>
            <li class="menu-separator"></li>
            <li class="mb-2"><a href="#">Mes suivis</a></li>
            <li class="mb-2"><a href="#">Confidentialité</a></li>
            <li class="mb-2"><?php if (isset($_SESSION['name'])) { ?>
                    <a href="<?= $router->generate('logout') ?>">Déconnexion</a>
                <?php } else { ?>
                    <a href="<?= $router->generate('login') ?>"><i class="fa-solid fa-right-to-bracket"></i>Connexion</a>
                <?php } ?>
            </li>
        </ul>
    </section>
    <div class="line-up"></div>
    <div class="w100" >
        <div class="line-straight mb-4"> </div>
        <section class="mt-2 flex-raw">
            <section class="bar-post">
                <ul class="flex-raw">
                    <li><a href="#"> <i class="fa-solid fa-font"></i> Texte</a></li>
                    <li><a href="#"> <i class="fa-solid fa-image"></i> Photo</a></li>
                    <li><a href="#"><i class="fa-solid fa-code"></i> Code</a> </li>
                    <li><a href="#"><i class="fa-solid fa-link"></i> Lien</a> </li>
                    <li><a href="#"><i class="fa-solid fa-volume-high"></i> Audio</a> </li>
                    <li><a href="#"><i class="fa-solid fa-video"></i> Vidéo</a></li>
                </ul>
            </section>
        </section>
        <section class="m-all flex-column-item ">
            <?php foreach ($datas as $data): ?>
                <article class="post posting style-post mb-4">
                    <div class="flex-row-between">
                        <h2><?= $data->name; ?></h2>
                        <a class="fs-1" href="#">...</a>
                    </div>
                    <?php if ($data->post->getPost_picture()): ?>
                        <figure>
                            <img id="img-post" src="<?= $data->post->getPost_picture(); ?>" alt="<?= $data->name; ?>">
                        </figure>
                    <?php endif; ?>
                    <p><?= $data->post->getContent(); ?></p>
                    <p> <span> <?= $data->post->getPublished_date()->format('d/m/Y'); ?></span></p>
                    <div class="line-straight-thin mb-4"> </div>
                    <div id="action-post" class="mt-4">
                        <a href="#"><i class="fa-solid fa-heart"></i></a>
                        <a href="#"><i class="fa-solid fa-comment"></i></a>
                        <a href="#"><i class="fa-solid fa-share"></i></a>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>
    </div>
    <script src="asset\js\main.js"></script>
</body>
</html>