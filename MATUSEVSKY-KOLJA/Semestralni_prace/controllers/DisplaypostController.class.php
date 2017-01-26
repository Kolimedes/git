<?php
class DisplaypostController extends Controller
{
    /**
     * Displays user's posts after it have been rated
     * @param params $param   params from the adress of the page
     */
    public function process($param)
    {
        $this->head['title'] = 'Hodnocení';
        $this->view = 'displaypost';

        $db = new Db();
        $_SESSION['post'] = $db->getPost($_SESSION['id_posts']);
        $_SESSION['ratings'] = $db->getRatingsByPost($_SESSION['id_posts']);
        $_SESSION['raters'] = array();

        for($i = 0; $i < 3; $i++){
            $_SESSION['ratings'][$i]['avg'] = $db->getAvgRating($_SESSION['ratings'][$i]['users_id_users'], $_SESSION['ratings'][$i]['posts_id_posts']);
        }

        foreach($_SESSION['ratings'] as $rating){
            array_push($_SESSION['raters'], $db->getUserId($rating['users_id_users']));
        }

    }
}