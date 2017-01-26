<?php
class RatepostController extends Controller
{
    /**
     * Rates post
     * @param params $param     params from the adress of the page
     */
    public function process($param)
    {
        $db = new Db();

        $this->view = 'ratepost';

        $this->head['title'] = 'Hodnptit příspěvek';

        $_SESSION['post'] = $db->getPost($_SESSION['id_posts']);

        if (isset($_POST['accept'])){
            $db->ratePost($_SESSION['rating']['id_ratings'], $_POST['originality'], $_POST['topic'], $_POST['language'], $_POST['comment']);
            $this->redirect('info_logged/ratings');
        }
    }
}