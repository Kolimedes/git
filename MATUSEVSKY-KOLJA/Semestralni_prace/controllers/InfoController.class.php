<?php
class InfoController extends Controller
{
    protected $controller;

    /**
     * Displays public part of the web
     * @param params $param     params from the adress of the page
     */
    public function process($param)
    {
        // Nastavení šablony
        $this->view = 'info';

        if($param[0] == "published"){
            $this->controller = new PublishedController;
        }
        else{
            $this->controller = new ArticleController;
        }
        $this->controller->process($param);

        $this->head['title'] = $this->controller->head['title'];
    }
}