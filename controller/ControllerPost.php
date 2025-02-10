<?php
class ControllerPost
{
    public function feed()
    {
        $model = new ModelPost();
        $modelUser = new ModelUser();
        $datas = $model->grid();
        require_once('./view/feed.php');
    }
}
