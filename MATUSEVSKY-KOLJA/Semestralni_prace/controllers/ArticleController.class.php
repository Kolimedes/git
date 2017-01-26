<?php
class ArticleController extends Controller
{
    /**
     * Displays articles for the info part of the web
     * @param $param    params from the adress of the page
     */
    public function process($param)
    {
        $db = new db();

        $article = $db->getArticle($param[0]);
        if (!$article)
            $this->redirect('error');

        $this->head = array(
            'title' => $article['title'],
            'key_words' => $article['key_words'],
            'description' => $article['description'],
        );

        $this->data['title'] = $article['title'];
        $this->data['content'] = $article['content'];

        $this->view = 'article';
    }
}