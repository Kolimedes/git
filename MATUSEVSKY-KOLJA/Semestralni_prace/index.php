<?php
// Nastavení interního kódování pro funkce pro práci s řetězci
mb_internal_encoding("UTF-8");

// Callback pro automatické načítání tříd controllerů a modelů
function autoloadFunction($class)
{
    // Končí název třídy řetězcem "Kontroler" ?
    if (preg_match('/Controller$/', $class))
        require("controllers/" . $class . ".class.php");
    else
        require("models/" . $class . ".class.php");
}

// Registrace callbacku (Pod starým PHP 5.2 je nutné nahradit fcí __autoload())
spl_autoload_register("autoloadFunction");

session_start();

// Vytvoření routeru a zpracování parametrů od uživatele z URL
$router = new RouterController();
$router->process(array($_SERVER['REQUEST_URI']));

// Vyrenderování šablony
$router->getView();