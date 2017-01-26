<?php
class ErrorController extends Controller
{
    /**
     * Redirects to error page
     * @param params $param     params from the adress of the page
     */
    public function process($param)
    {
        // Hlavička požadavku
        header("HTTP/1.0 404 Not Found");
        // Hlavička stránky
        $this->head['title'] = 'Error 404';
        // Nastavení šablony
        $this->view = 'error';
    }
}