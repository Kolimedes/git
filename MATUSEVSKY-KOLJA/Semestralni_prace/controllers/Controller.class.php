<?php
abstract class Controller
{

    protected $data = array();
    protected $view = "";
    protected $head= array('title' => '', 'key_words' => '', 'description' => '');

    public function __construct(){}

    /**
     * Sets view of the page
     */
    public function getView(){
        if ($this->view) {
            extract($this->data);
            require("views/" . $this->view . ".phtml");
        }
    }

    /**
     * Redirects to the new page
     * @param $url  adress of the page
     */
    public function redirect($url){
        header("Location: /$url");
        header("Connection: close");
        exit;
    }

    /**
     * Processes params given to it
     * @param $param    params from the adress of the page
     * @return mixed
     */
    abstract function process($param);
}

