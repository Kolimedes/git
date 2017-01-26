<?php
class UsersController extends Controller
{
    protected $controller;

    /**
     * Redirects user to logged users part of the site
     * @param $param    params from the adress of the page
     */
    public function process($param)
    {
        $this->head['title'] = 'Pro uživatele';

        $db = new Db();

        if($db->isLogged()){
            $_SESSION['is_logged'] = true;
            if ($_SESSION['user']['rights_id_rights'] == 3) {
                $this->redirect('info_logged/ratings');
            }
            else{
                $this->redirect('info_logged/posts');
            }
        }else{
            $this->view = 'users';
            $_SESSION['is_logged'] = false;
        }

    }
}