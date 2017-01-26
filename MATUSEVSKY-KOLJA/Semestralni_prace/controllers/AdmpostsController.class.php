<?php
class AdmpostsController extends Controller
{
    /**
     * Manages assigning raters to the posts
     * @param $param    params from the adress of the page
     */
    public function process($param)
    {
        // Nastavení šablony
        $this->view = 'admposts';

        $this->head['title'] = 'Seznam příspěvků';

        $db = new Db();

        $_SESSION['posts'] = array();
        $posts = $db->getAllPosts();
        if($posts != null){
            foreach ($posts as $post){
                if($post['published'] == 0){
                    array_push($_SESSION['posts'], $post);
                }
            }
        }
        $_SESSION['raters'] = $db->getRaters();

        if($_SESSION['posts'] != null){
            $i = 0;
            foreach($_SESSION['posts'] as $post){
                $ratings = $db->getRatingsByPost($post['id_posts']);
                $_SESSION['posts'][$i]['raters'] = array();

                if($ratings != null){
                    for($j = 0; $j < 3; $j++) {
                        if (isset($ratings[$j]) != null) {
                            $_SESSION['posts'][$i]['raters'][$j] = $db->getUserId($ratings[$j]['users_id_users']);
                            $_SESSION['posts'][$i]['ratings'][$j] = $db->getRating($_SESSION['posts'][$i]['raters'][$j]['id_users'], $post['id_posts']);
                            $_SESSION['posts'][$i]['ratings'][$j]['avg'] = $db->getAvgRating($_SESSION['posts'][$i]['raters'][$j]['id_users'], $post['id_posts']);


                        } else {
                            $_SESSION['posts'][$i]['raters'][$j] = null;
                            $_SESSION['posts'][$i]['ratings'][$j] = null;
                        }
                    }
                    $i++;
                }
                else{
                    for($j = 0; $j < 3; $j++) {
                        $_SESSION['posts'][$i]['raters'][$j] = null;
                        $_SESSION['posts'][$i]['ratings'][$j] = null;
                    }
                     $i++;
                }
            }
        }

        if (isset($_POST['choose'])){
            $db->createRatings($_POST[$_POST['jbutton']], $_POST['id']);
            $this->redirect('info_logged/admposts');
        }

        if (isset($_POST['delete'])){
            $db->deletePostRatingsByUser($_POST[$_POST['jbutton']], $_POST['id']);
            $this->redirect('info_logged/admposts');
        }

        if (isset($_POST['publish'])){
            $db->publishPost($_POST['id']);
            $this->redirect('info_logged/admposts');
        }

        if (isset($_POST['deny'])){
            $db->denyPost($_POST['id']);
            $this->redirect('info_logged/admposts');
        }
    }
}