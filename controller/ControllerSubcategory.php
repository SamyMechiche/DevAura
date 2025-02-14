<?php
class ControllerSubcategory {
    public function home(){
        global $router;
        $model = new ModelSubcategory();
        $datas = $model->slider();
        require_once('./view/cate_souscate.php');
    }

    public function getPost() {
        $model = new ModelSubcategory();
        $datas = $model->slider(); // Récupération des données du slider
        require_once('./view/cate_souscate.php'); // Transfert à la vue
    }
}