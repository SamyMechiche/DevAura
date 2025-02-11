<?php
class ControllerPost
{
    public function feed()
    {
        $model = new ModelPost();
        $modelUser = new ModelUser();
        $datas = $model->feed();
        require_once('./view/feed.php');
    }
}
