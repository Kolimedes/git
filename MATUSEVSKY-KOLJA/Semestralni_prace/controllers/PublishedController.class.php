<?php
class PublishedController extends Controller
{
    /**
     * Displays published posts for public
     * @param params $param     params from the adress of the page
     */
    public function process($param)
    {

        $this->head['title'] = 'Publikace';
        $this->view = 'published';

        $db = new Db();

        $_SESSION['posts'] = $db->getPublishedPosts();
    }
}