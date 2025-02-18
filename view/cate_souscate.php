<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Souscat | DevAura</title>
    <meta name="description" content="Page des sous catégories d'une des deux catégories principales">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="./asset/css/style.css">
</head>

<body>

    <section class="flex-between">

        <section class="mr-2 row-limit-size">
            <div class="test" >
            <!-- Barre laterale pour le menu -->
            <ul>
                <li class="marginb-4"><a class="logo" href="/DevAura"> &lt;DevAura&gt;</a></li>
                <li class="marginb-2"><button class="toggle-button switch"><i class="fas fa-adjust"></i> </button></li>
                <li class="marginb-4"> <?php if (isset($_SESSION['name'])): ?>
                        <h2>Bonjour <?= $_SESSION['name']; ?></h2>
                    <?php else: ?>
                        <a href="<?= $router->generate('login') ?>"><i class="fa-solid fa-right-to-bracket"></i>Connexion</a>
                    <?php endif; ?>
                </li>
                <li class="marginb-4"><a href="/DevAura"><i class="fa-solid fa-house"></i> Accueil</a></li>
                <li class="marginb-4"><a href="./feed"><i class="fa-solid fa-compass"></i> Explorer</a></li>
                <li class="marginb-4"><a href="#"><i class="fa-solid fa-user-group"></i> Communauté</a></li>
                <li class="marginb-4"><a href="#"><i class="fa-solid fa-message"></i> Messages</a></li>
                <li class="marginb-4"><a href="#"><i class="fa-solid fa-bolt"></i> Tendances</a></li>
                <li class="menu-separator"></li>
                <li class="marginb-2"><a href="#">Mes suivis</a></li>
                <li class="marginb-2"><a href="#">Confidentialité</a></li>
                <li class="marginb-2"><?php if (isset($_SESSION['name'])) { ?>
                        <a href="<?= $router->generate('logout') ?>">Déconnexion</a>
                    <?php } else { ?>
                        <a href="<?= $router->generate('login') ?>"><i class="fa-solid fa-right-to-bracket"></i>Connexion</a>
                    <?php } ?>
                </li>

            </ul>
        </div>
        </section>
        <div class="line-up"></div>
        <div>
            <div class="line-straight mb-4"> </div>
        </div>
        <?php
        require_once './model/ModelSubcategory.php';

        $model = new ModelSubcategory();
        $datas = $model->slider();
        ?>

        <div id="controls-carousel" class="relative testu" data-carousel="static">
            <!-- Carousel -->
            <div class="relative h-56 overflow-hidden md:h-96 caroussel">
                <?php foreach (array_chunk($datas, 5) as $index => $sliderChunk): ?>
                    <div class="<?= $index === 0 ? 'block' : 'hidden'; ?> duration-700 ease-in-out flex items-center justify-center " data-carousel-item="<?= $index === 0 ? 'active' : ''; ?>">
                        <div class="flex flex-row items-center justify-center space-x-8 position-re gap ">
                            <?php foreach ($sliderChunk as $sliderData): ?>
                                <div class="flex flex-col items-center group relative card-caroussel rounded-lg shadow-lg p-4">
                                    <img src="<?= htmlspecialchars($sliderData->getPicture()); ?>" alt="Slider Image" class="w-32 h-32 object-contain">
                                    <div class="mt-2 font-bold"><?= htmlspecialchars($sliderData->getSubcategory_name()); ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- Navigation -->
            <button type="button" class="absolute top-[50%] left-20 -translate-y-1/2 z-30 flex items-center justify-center w-10 h-10 focus:outline-none" data-carousel-prev>
                <img class="flch-caroussel" src="asset/img/slider/Vector 15.svg" alt="">
            </button>
            <button type="button" class="absolute top-[50%] right-20 -translate-y-1/2 z-30 flex items-center justify-center w-10 h-10 focus:outline-none" data-carousel-next>
                <img class="flch-caroussel" src="asset/img/slider/Vector 16.svg" alt="">
            </button>
        </div>
    </section>
    <section class="sous-cat-list">
        <?php foreach ($datas as $data) : ?>
            <div class="flex-between card-list-sous-cat" >
                <img src="<?= htmlspecialchars($data->getPicture()); ?>" alt="Slider Image" class="w-32 h-32 object-contain mb-4">
                <div class="flex-column" >
                    <div><?= htmlspecialchars($data->getSubcategory_name()); ?></div>
                    <div><?= htmlspecialchars($data->getDescription()); ?></div>
                </div>
            </div>
            <hr>
            <br>
        <?php endforeach; ?>
    </section>
    </section>
    <script src="./asset/js/main.js"></script>

</html>