<?php
class ControllerPost
{
    public function feed()
    {
        global $router;
        $model = new ModelPost();
        $modelUser = new ModelUser();
        $datas = $model->feed();
        require_once('./view/feed.php');
    }
}