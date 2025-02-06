<?php

class ControllerUser {
    public function login(){
        $model = new ModelUser();
        $model->isConnected();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!empty($_POST['email']) && !empty($_POST['pwd'])){
                $user = $model->getUser($_POST['email']);
                if($user && password_verify($_POST['password'], $user->getPassword())){ //on vérifie grace à la méthode user si la requête a bien récupéré un user dans la bdd avec le mail rentré
                    $_SESSION['id'] = $user->getId();
                    $_SESSION['name'] = $user->getName();
                    header('Location: /DevAura');
                } else { //si la méthode ne permet pas de faire matcher l'email avec celui d'un de nos users dans la bdd
                    $error = 'Email/password incorrect';
                    require_once('./view/login.php');
                }
            } else {
                $error = 'Les champs ne sont pas correctes';
                require_once('./view/login.php');
            }
        } else {
            require_once('./view/login.php');
        }
    }

    public function logout(){
        session_unset(); //on détruit les VARIABLES DE SESSION
        session_destroy(); //on détruit la SESSION en elle même
        header('Location: /DevAura');
        exit();
    }

    public function signing(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])){
                $password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $user = new ModelUser();
                $user->signingIn($_POST['name'], $_POST['email'], $password_hash);

                header('Location: /DevAura/login');

            } else {
                $error = 'Les champs ne sont pas correctes';
            }

        } else {
            require_once('./view/signing.php');
        }
    }
}