<?php

class ControllerUser {

    public function displayForms(){
        require_once('./view/login.php');
    }

    public function handleForms(){
            if (isset($_POST['form_type']) && $_POST['form_type'] === 'login') {
                $this->login();
            } elseif (isset($_POST['form_type']) && $_POST['form_type'] === 'signing') {
                $this->signing();
            } else {
                require_once('./view/login.php');
            }
    }

    private function login(){
        $model = new ModelUser();
        $model->isConnected();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!empty($_POST['mail']) && !empty($_POST['pass'])){
                $user = $model->getUser($_POST['mail']);
                if($user && password_verify($_POST['pass'], $user->getPassword())){ 
                // on vérifie grace à la méthode user si la requête a bien récupéré un user dans la bdd avec le mail rentré
                    $_SESSION['id'] = $user->getId_user();  
                    $_SESSION['name'] = $user->getName();
                    header('Location: /DevAura');
                    exit();
                } else { 
                    // si la méthode ne permet pas de faire matcher l'email avec celui d'un de nos users dans la bdd
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
        session_unset(); // on détruit les VARIABLES DE SESSION
        session_destroy(); // on détruit la SESSION en elle même
        header('Location: /DevAura');
        exit();
    }

    private function signing(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $model = new ModelUser();
            $user = $model->checkUser($_POST['name'], $_POST['email']);

            if($user){
                echo 'Cet utilisateur existe déjà';
            } else {
            if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])){

                $password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $id_user = $model->signingIn($_POST['name'], $_POST['email'], $password_hash);

                if($id_user){
                    $_SESSION['id'] = intval($id_user);
                    $_SESSION['name'] = $_POST['name'];
                    header('Location: /DevAura');
                }
                    
                exit();
            } else {
                echo 'Veuillez remplir tous les champs';
            }
        }
        } else {
            require_once('./view/signing.php');
        }
    }
}
