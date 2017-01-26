<?php
class AddpostController extends Controller
{
    /**
     * Adds post to the database
     * @param $param    params from the adress of the page
     */
    public function process($param)
    {
        $this->head['title'] = 'Nový příspěvek';

        $db = new Db();

        if (isset ( $_POST['send'] )) {
            $filename = rand(1000,100000)."-".$_FILES["fileToUpload"]["name"];
            $tmpName = $_FILES["fileToUpload"]["tmp_name"];
            move_uploaded_file($tmpName, "uploads/".$filename);
            $db->addPost($_POST['name'], $_POST['author'], $_POST['abstract'], $_SESSION['user']['id_users'], $filename);

            $this->redirect('users');
        }
        else{
            $this->view = 'addpost';
        }
    }
}