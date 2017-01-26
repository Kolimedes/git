<?php
class LoginController extends Controller
{
    /**
     * Loggs in the user
     * @param params $param     params from the adress of the page
     */
    public function process($param)
    {
        $this->head['title'] = 'Přihlásit';
        $this->view = 'login';

        $db = new Db();
        $message = null;

        if(isset($_SESSION["user"])){
            $db->logout();
        }

        if (isset ( $_POST ["accept"] )) {
            if($db->getUser($_POST ["login"]) == null){
                $message = "Špatné uživatelské jméno!";
            }else if($db->checkPassword($_POST ["login"], $_POST ["password"]) != 0){
                $message = "Špatné heslo!";
            }else if($db->login($_POST ["login"])){
                $this->redirect('users');
            }else{
                $message = "Přihlášení se nezdařilo!";
            }
        }

        $this->data["message"] = $message;
    }
}