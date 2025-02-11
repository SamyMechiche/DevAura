<?php

class ControllerSubcategory {
    
    public function home()
    {
        $model = new ModelSubcategory();
        $datas = $model->grid();
        require_once('./view/homepage.php');
    }
}