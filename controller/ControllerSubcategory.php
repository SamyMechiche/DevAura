<?php
class ControllerSubcategory {
    public function getSlider(){
        global $router;
        $model = new ModelSubcategory();
        $datas = $model->slider();
        require_once('./view/cate_souscate.php');
        }

    public function home()
    {
        global $router;
        $model = new ModelSubcategory();
        $datas = $model->grid();
        require_once('./view/homepage.php');
    }
}