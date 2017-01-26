<?php
class AdmusersController extends Controller
{
    /**
     * Manages users rights
     * @param $param    params from the adress of the page
     */
    public function process($param)
    {
        // Nastavení šablony
        $this->view = 'admusers';

        $this->head['title'] = 'Seznam uživatelů';

        $db = new Db();
        $_SESSION['users'] = $db->getAllUsers();

        if (isset($_POST['accept'])){
            $db->changeUserRights($_POST['id'], $_POST['select']);
            $this->redirect('info_logged/admusers');
        }
    }
}