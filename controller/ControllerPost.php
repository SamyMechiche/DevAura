<?php
class ControllerPost
{
    public function home()
    {
        global $router;
        $model = new ModelPost();
        $modelUser = new ModelUser();
        $datas = $model->home();
        require_once('./view/homepage.php');
    }
}
