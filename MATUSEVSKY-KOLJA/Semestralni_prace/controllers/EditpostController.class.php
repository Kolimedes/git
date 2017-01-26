<?php
class EditpostController extends Controller
{
    /**
     * Edits selected post
     * @param params $param     params from the adress of the page
     */
    public function process($param)
    {
        $db = new Db();

        $this->view = 'editpost';

        $this->head['title'] = 'Upravit příspěvek';

        $_SESSION['post'] = $db->getPost($_SESSION['id_posts']);

        if (isset($_POST['accept'])){
            $filename = rand(1000,100000)."-".$_FILES["fileToUpload"]["name"];
            $tmpName = $_FILES["fileToUpload"]["tmp_name"];
            move_uploaded_file($tmpName, "uploads/".$filename);
            $db->editPost($_SESSION['post']['id_posts'], $_POST['name'], $_POST['authors'], $_POST['abstract'], $filename);
            $this->redirect('users');
        }
    }
}