<?php
class ControllerPost
{
    public function feed()
    {
        global $router;
        $model = new ModelPost();
        $modelUser = new ModelUser();
        $datas = $model->feed();
        $id_user = (isset($_SESSION['id'])) ? $_SESSION['id'] : '' ;
        foreach($datas as $data){
            $postId = $data->post->getId_post();
            $data->like = $model->checkFav($postId, $id_user);
        }
        
        require_once('./view/feed.php');
    }

    public function fav(int $id){ // Recuperation Id Post depuis l'URL de l'index
        $id_user = $_SESSION['id']; // Récuperer l'id du user via le $_SESSION
        $model = new ModelPost(); // Création d'une nouvelle instance de ModelPost
        $data = $model->checkFav($id, $id_user); // Stock les données de la methode de checkfav dans $data


        if($data === false){ // cf -> return de checkFav dans model
            
            $model->fav($id, $id_user); // Notre instance de modelPost appel une nouvelle methode fav qui attend en parametre un id_post et un id_user
            $data = $model->countFav($id); // sStock les données de la methode de fav dans $data
            
            $array = [
                'success' => true, // si la requete est bien executée
                'countFav' => $data, // Récupere les données
                'isLike' => true  // Résultat de checkFav
            ];

            header('Content-Type: application/json'); // Header : recupere les données avant le html et le reste permet d'envoyer en format JSON (sinon sa envoies en TEXTE)
            echo json_encode($array); // Envoies les données de $array en JSON

            exit();

        } else {  // si = true
            $model->removeFav($id, $id_user); // Notre instance de modelPost appel une nouvelle methode removeFav qui attend en parametre un id_post et un id_user
            $data = $model->countFav($id); // sStock les données de la methode de removeFav dans $data

            $array = [
                'success' => true, // si la requete est bien executée
                'countFav' => $data, // Récupere les données
                'isLike' => false // Résultat de removeFav
            ];

            header('Content-Type: application/json'); // Header : recupere les données avant le html et le reste permet d'envoyer en format JSON (sinon sa envoies en TEXTE)
            echo json_encode($array);  // Envoies les données de $array en JSON
            exit();

        }

        
    }
}
