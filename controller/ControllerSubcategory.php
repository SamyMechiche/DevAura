<?php

class ControllerSubcategory {
    
    public function home()
    {
        global $router;
        $model = new ModelSubcategory();
        $datas = $model->grid();
        require_once('./view/homepage.php');
    }
}