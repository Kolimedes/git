<?php
class Info_loggedController extends Controller
{
    protected $controller;

    /**
     * Displays part of the web for the logged users
     * @param params $param     params from the adress of the page
     */
    public function process($param)
    {
        // Nastavení šablony
        $this->view = 'info_logged';

        $controllerClassName = ucwords($param[0]) . 'Controller';
        if (file_exists('controllers/' . $controllerClassName . '.class.php')){
            $this->controller = new $controllerClassName;
            $this->controller->process($param);

            $this->head['title'] = $this->controller->head['title'];
        }
        else{
            $this->redirect('error');
        }
    }
}