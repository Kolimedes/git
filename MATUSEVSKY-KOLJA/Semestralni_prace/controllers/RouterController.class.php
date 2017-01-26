<?php
class RouterController extends Controller
{
    // Instance of the controller
    protected $controller;

    /**
     * Creating neaded controller
     * @param params $param     params from the adress of the page
     */
    public function process($param){
        $parseURLArray = $this->parseURL($param[0]);

        if (empty($parseURLArray[0])) {
            $this->redirect('info/introduction');
        }

        // controller is the first param in the URL
        $controllerClassName = $this->getClassName(array_shift($parseURLArray)) . 'Controller';

        if (file_exists('controllers/' . $controllerClassName . '.class.php')){
            $this->controller = new $controllerClassName;
        }
        else{
            $this->redirect('error');
        }

        if(!$_SESSION['is_logged'] && $controllerClassName == "Info_loggedController"){
            $this->redirect('error');
        }
        elseif($controllerClassName == "Info_loggedController") {
            if($_SESSION['user']['rights_id_rights'] == 3){
                if($parseURLArray[0] != "ratepost"){
                    if($parseURLArray[0] != "ratings" ) {
                        $this->redirect('error');
                    }
                }

            }
            elseif ($_SESSION['user']['rights_id_rights'] == 2){
                if($parseURLArray[0] != "editpost"){
                    if($parseURLArray[0] != "posts"){
                        $this->redirect('error');
                    }
                }
            }
        }

        // Calling of the controller
        $this->controller->process($parseURLArray);

        // Setting variables for template
        $this->data['title'] = $this->controller->head['title'];
        $this->data['description'] = $this->controller->head['description'];
        $this->data['key_words'] = $this->controller->head['key_words'];

        // Setting main layout
        $this->view = 'layout';
    }

    /**
     * Converts url adress to name of the class
     * @param $text     text to be converted
     * @return mixed|string     class name
     */
    private function getClassName($text){
        $line = str_replace('-', ' ', $text);
        $line = ucwords($line);
        $line = str_replace(' ', '', $line);
        return $line;
    }

    /**
     * Parsing URL  to get params
     * @param $url  url to be parsed
     * @return array    parsed array
     */
    private function parseURL($url){
        $parseURL = parse_url($url);
        $parseURL["path"] = ltrim($parseURL["path"], "/");
        $parseURL["path"] = trim($parseURL["path"]);
        $paramArray = explode("/", $parseURL["path"]);
        return $paramArray;
    }

}