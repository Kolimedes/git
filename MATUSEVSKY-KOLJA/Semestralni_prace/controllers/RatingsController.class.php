<?php
class RatingsController extends Controller
{
    /**
     * Displays page with posts to rate
     * @param params $param     params from the adress of the page
     */
    public function process($param)
    {
        $this->head['title'] = 'Hodnocení';

        $db = new Db();

        $ratings = $db->getRatingsByUser($_SESSION['user']['id_users']);

        $_SESSION['posts'] = NULL;

        if($ratings != NULL){
            $i = 0;
            foreach ($ratings as $rating){
                $post = $db->getPost($rating['posts_id_posts']);
                if($post['published'] == 0){
                    $_SESSION['posts'][$i] = $post;
                    $avg = $db->getAvgRating($_SESSION['user']['id_users'], $rating['posts_id_posts']);
                    if($avg == 0){
                        $_SESSION['posts'][$i]['ratings'] = "Nehodnoceno";
                    }
                    else{
                        $_SESSION['posts'][$i]['ratings'] = $avg;
                    }
                }
                $i++;
            }
        }


        if (isset($_POST['rate'])){
            $_SESSION['id_posts'] = $_POST['id'];
            $_SESSION['rating'] = $db->getRating($_SESSION['user']['id_users'], $_POST['id']);
            $this->redirect('info_logged/ratepost');
        }

        $this->view = 'ratings';
    }
}