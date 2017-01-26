<?php
class PostsController extends Controller
{
    /**
     * Displays user's posts
     * @param params $param     params from the adress of the page
     */
    public function process($param)
    {
        $this->head['title'] = 'Příspěvky';
        $this->view = 'posts';

        $db = new Db();
        if($_SESSION['user']['rights_id_rights'] == 1){
            $_SESSION['posts'] = $db->getAllPosts();
        }
        elseif ($_SESSION['user']['rights_id_rights'] == 2){
            $_SESSION['posts'] = $db->getUserPosts($_SESSION['user']['id_users']);
        }


        if (isset($_POST['delete'])){
            $db->deletePost($_POST['id']);
            $this->redirect('users');
        }

        if (isset($_POST['edit'])){
            $_SESSION['id_posts'] = $_POST['id'];
            $this->redirect('info_logged/editpost');
        }

        if (isset($_POST['display'])){
            $_SESSION['id_posts'] = $_POST['id'];
            $this->redirect('info_logged/displaypost');
        }

    }
}