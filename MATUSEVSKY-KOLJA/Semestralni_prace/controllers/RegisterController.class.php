<?php
class RegisterController extends Controller
{
    /**
     * Registers user
     * @param params $param     params from the adress of the page
     */
    public function process($param)
    {
        $this->head['title'] = 'Registrovat';

        $db = new Db();
        $message = null;

        if (isset ( $_POST ["accept"] )) {
            if (strcmp ( $_POST ["password"], $_POST ["password_again"] ) != 0) {
                $message = "Zadaná hesla se neshodují";
            } else if ($db->getUser( $_POST ["login"] ) != null) {
                $message = "Zadané uživatelské jméno již někdo používá!";
            }else{
                $db->addUser($_POST ["login"], $_POST ["password"], $_POST ["name"], $_POST ["email"]);
                if(!$db->login($_POST ["login"])){
                    $message = "Registrace se nezdařila!";
                }
            }
        }

        if($db->isLogged()){
            $this->view = 'registerOK';
        }else{
            $this->data["message"] = $message;
            $this->view = 'register';
        }
    }
}