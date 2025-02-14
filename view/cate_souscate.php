<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Souscat | DevAura</title>
    <meta name="description" content="Page des sous catégories d'une des deux catégories principales">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <link rel="stylesheet" href="./asset/css/style.css">
</head>
<body>
<?php
require_once './model/ModelSubcategory.php';

$model = new ModelSubcategory();
$datas = $model->slider();
?>

<div id="controls-carousel" class="relative w-full" data-carousel="static">
    <!-- Carousel -->
    <div class="relative h-56 overflow-hidden md:h-96 bg-gray-900">
        <?php foreach (array_chunk($datas, 5) as $index => $sliderChunk): ?>
            <div class="<?= $index === 0 ? 'block' : 'hidden'; ?> duration-700 ease-in-out flex items-center justify-center" data-carousel-item="<?= $index === 0 ? 'active' : ''; ?>">
                <div class="flex flex-row items-center justify-center space-x-8 position-re gap">
                    <?php foreach ($sliderChunk as $sliderData): ?>
                        <div class="flex flex-col items-center group relative bg-gray-800 rounded-lg shadow-lg p-4">
                            <img src="<?= htmlspecialchars($sliderData->getPicture()); ?>" alt="Slider Image" class="w-32 h-32 object-contain">
                            <div class="mt-2 text-white font-bold"><?= htmlspecialchars($sliderData->getSubcategory_name()); ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- Navigation -->
    <button type="button" class="absolute top-1/2 left-2 -translate-y-1/2 z-30 flex items-center justify-center w-10 h-10 focus:outline-none" data-carousel-prev>
        <img src="asset/img/slider/Vector 15.svg" alt="">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
    </button>
    <button type="button" class="absolute top-1/2 right-2 -translate-y-1/2 z-30 flex items-center justify-center w-10 h-10 focus:outline-none" data-carousel-next>
        <img src="asset/img/slider/Vector 16.svg" alt="">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
        </svg>
    </button>
</div>



</body>
</html>
