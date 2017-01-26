<?php
class Db{

    private $db;
    private $settings = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_EMULATE_PREPARES => false,
    );

    public function __construct() {
        $this->db = new PDO ( "mysql:host=localhost;dbname=db", "root", "", $this->settings);
    }

    /**
     * Returns article
     * @param $url  url of the article
     * @return null
     */
    public function getArticle($url)
    {
        $query =  "SELECT `article_id`, `title`, `content`, `url`, `description`, `key_words` FROM `articles` WHERE `url` = :url";
        $return = $this->db->prepare($query);
        $params = array(':url' => $url);
        if(!$return->execute($params)){
            return null;
        }
        $return->execute($params);

        $result =  $return->fetchAll();

        if($result != null){
            return $result[0];
        }else{
            return null;
        }
    }

    /**
     * Executes query
     * @param $request  request to be executed
     * @return null|PDOStatement
     */
    private function executeQuery($request) {
        $result = $this->db->query ( $request );
        if (! $result) {
            $error = $this->db->errorInfo ();
            echo $error [2];
            return null;
        } else {
            return $result;
        }
    }

    /**
     * Returns user
     * @param $login    login of the user
     * @return null
     */
    public function getUser($login) {
        $query = "SELECT * FROM users WHERE login = :log;";
        $return = $this->db->prepare($query);
        $params = array(':log' => $login);
        if(!$return->execute($params)){
            return null;
        }
        $result = $return->fetchAll();

        if($result != null){
            return $result[0];
        }else{
            return null;
        }
    }

    /**
     * Returns user
     * @param $id   id of the user
     * @return null
     */
    public function getUserId($id) {
        $query = "SELECT * FROM users WHERE id_users = :id;";
        $return = $this->db->prepare($query);
        $params = array(':id' => $id);
        if(!$return->execute($params)){
            return null;
        }
        $result = $return->fetchAll();

        if($result != null){
            return $result[0];
        }else{
            return null;
        }
    }

    /**
     * Adds user
     * @param $login    username
     * @param $password password
     * @param $name     name of the user
     * @param $email    email of the user
     */
    public function addUser($login, $password, $name, $email) {
        $query = "INSERT INTO `users` (`id_users`, `login`, `password`, `name`, `email`, `rights_id_rights`) VALUES (?,?,?,?,?,?);";
        $return = $this->db->prepare($query);
        $login = htmlspecialchars($login);
        $password = htmlspecialchars($password);
        $name = htmlspecialchars($name);
        $email = htmlspecialchars($email);
        $return->execute(array(NULL, $login, $password, $name, $email, 2));
    }

    /**
     * Changes user's rights
     * @param $userID   user id
     * @param $rights   new rights
     */
    public function changeUserRights($userID, $rights){
        $query = "UPDATE `users` SET `rights_id_rights` = :rights WHERE `users`.`id_users` = :userID;";
        $return = $this->db->prepare($query);
        $params = array(':rights' => $rights, ':userID' => $userID);
        $return->execute($params);

    }

    /**
     * Returns raters
     * @return array|null|PDOStatement
     */
    public function getRaters(){
        $query = "SELECT * FROM `users` WHERE `rights_id_rights` = '3' OR `rights_id_rights` = '1';";
        $result = $this->executeQuery ( $query);
        $result = $result->fetchAll();

        if($result != null && count($result)>0){
            return $result;
        } else {
            return null;
        }
    }

    /**
     * Returns all users
     * @return array|null|PDOStatement
     */
    public function getAllUsers(){
        $query = "SELECT * FROM `users`;";
        $result = $this->executeQuery($query);
        $result = $result->fetchAll();

        if($result != null && count($result)>0){
            return $result;
        } else {
            return null;
        }
    }

    /**
     * Loggs in the user
     * @param $login    login of the user
     * @return bool
     */
    public function login($login){

        if($this->getUser($login) != null){
            $_SESSION["user"] = $this->getUser($login);
            return true;
        }
        else{
            return false;
        }

    }

    /**
     * Loggs out the user
     */
    public function logout(){
        session_unset($_SESSION["user"]);
    }

    /**
     * Checks the password
     * @param $login        username
     * @param $password     users password to be checked
     * @return bool|int
     */
    public function checkPassword($login, $password){
        $user = $this->getUser($login);
        if($user == null){
            return false;
        }

        return strcmp($user["password"], $password);

    }

    /**
     * Returns true if someone is logged in, otherwise false
     * @return bool
     */
    public function isLogged(){
        return isset($_SESSION["user"]);
    }

    /**
     * Adds post
     * @param $name     name of the post
     * @param $author   author of the post
     * @param $abstract abstract of the post
     * @param $idUser   users id
     * @param $file     file name
     */
    public function addPost($name, $author, $abstract, $idUser, $file) {
        $query = "INSERT INTO `posts`(`id_posts`, `name`, `author`, `published`, `abstract`, `users_id_users`, `filename`) VALUES (?,?,?,?,?,?,?)";
        $return = $this->db->prepare($query);
        $name = htmlspecialchars($name);
        $abstract = htmlspecialchars($abstract);
        $file = htmlspecialchars($file);
        $return->execute(array(NULL, $name, $author, null, $abstract, $idUser, $file));
    }

    /**
     * Returns post
     * @param $idPost   id of the post
     * @return null
     */
    public function getPost($idPost) {
        $query = "SELECT * FROM posts WHERE id_posts = :id;";
        $return = $this->db->prepare($query);
        $params = array(':id' => $idPost);
        if(!$return->execute($params)){
            return null;
        }
        $result = $return->fetchAll();

        if($result != null){
            return $result[0];
        }else{
            return null;
        }
    }

    /**
     * Get all posts by user
     * @param $idUser       users's id
     * @return array|null
     */
    public function getUserPosts($idUser) {
        $query = "SELECT * FROM posts WHERE users_id_users = :user;";
        $return = $this->db->prepare($query);
        $params = array(':user' => $idUser);
        if(!$return->execute($params)){
            return null;
        }
        $result = $return->fetchAll();

        if($result != null && count($result)>0){
            return $result;
        } else {
            return null;
        }
    }

    /**
     * Returns all the posts
     * @return array|null|PDOStatement
     */
    public function getAllPosts(){
        $query = "SELECT * FROM `posts`;";
        $result = $this->executeQuery($query);
        $result = $result->fetchAll();

        if($result != null && count($result)>0){
            return $result;
        } else {
            return null;
        }
    }

    /**
     * Returns all the published posts
     * @return array|null|PDOStatement
     */
    public function getPublishedPosts(){
        $query = "SELECT * FROM `posts` WHERE `published`='1';";
        $result = $this->executeQuery($query);
        $result = $result->fetchAll();

        if($result != null && count($result)>0){
            return $result;
        } else {
            return null;
        }
    }

    /**
     * Edits post
     * @param $idPost   id of the post
     * @param $name     name of the post
     * @param $author   author of the post
     * @param $abstract abstract of the post
     * @param $file     file name
     */
    public function editPost($idPost, $name, $author, $abstract, $file){
        $result = "UPDATE `posts` SET `name` = :name, `author` = :author, `abstract` = :abstract, `filename` = :file WHERE `posts`.`id_posts` = :idPost;";
        $return = $this->db->prepare($result);
        $name = htmlspecialchars($name);
        $author = htmlspecialchars($author);
        $abstract = htmlspecialchars($abstract);
        $file = htmlspecialchars($file);
        $params = array(':name' => $name, ':author' => $author, ':abstract' => $abstract, ':file' => $file, ':idPost' => $idPost);

        $return->execute($params);
    }

    /**
     * Deletes post
     * @param $idPost   id of the post
     */
    public function deletePost($idPost){
        $this->deletePostRatings($idPost);
        $query = "DELETE FROM `posts` WHERE `id_posts` = :idPost;";
        $return = $this->db->prepare($query);
        $params = array(':idPost' => $idPost);

        $return->execute($params);
    }

    /**
     * Creates ratings by user to post
     * @param $idUser   users id
     * @param $idPost   id of the post
     */
    public function createRatings($idUser, $idPost){
        $query = "INSERT INTO `ratings` (`id_ratings`, `originality`, `topic`, `language_level`, `comment`, `users_id_users`, `posts_id_posts`) VALUES (NULL, '0', '0', '0', NULL, '$idUser', '$idPost');";
        $this->executeQuery($query);

        $query = "UPDATE `posts` SET `published` = '0' WHERE `posts`.`id_posts` = :idPost;";
        $return = $this->db->prepare($query);
        $params = array(':idPost' => $idPost);

        $return->execute($params);
    }

    /**
     * deletes post's ratings
     * @param $idPost   id of the post
     */
    public function deletePostRatings($idPost){
        $query = "DELETE FROM `ratings` WHERE `posts_id_posts` = :idPost;";
        $return = $this->db->prepare($query);
        $params = array(':idPost' => $idPost);

        $return->execute($params);
    }

    /**
     * Delete ratings by user
     * @param $idUser   user's id
     * @param $idPost   id of the post
     */
    public function deletePostRatingsByUser($idUser, $idPost){
        $query = "DELETE FROM `ratings` WHERE `users_id_users` = :idUser AND `posts_id_posts` = :idPost;";
        $return = $this->db->prepare($query);
        $params = array(':idUser' => $idUser, ':idPost' => $idPost);

        $return->execute($params);
    }

    /**
     * Rates thepost
     * @param $idRatings    id of the rating
     * @param $originality  originality of the post
     * @param $topic        topic of the post
     * @param $lang         language level of the post
     * @param $comment      comment to the post
     */
    public function ratePost($idRatings, $originality, $topic, $lang, $comment){
        $query = "UPDATE `ratings` SET `originality` = :originality, `topic` = :topic, `language_level` = :lang, `comment` = :comment WHERE `ratings`.`id_ratings` = :idRatings;";
        $return = $this->db->prepare($query);
        $params = array(':originality' => $originality, ':topic' => $topic, ':lang' => $lang, ':comment' => $comment, ':idRatings' => $idRatings);

        $return->execute($params);

    }

    /**
     * Returns all ratings
     * @return array|null|PDOStatement
     */
    public function getAllRatings(){
        $query = "SELECT * FROM `ratings`;";
        $result = $this->executeQuery($query);
        $result = $result->fetchAll();

        if($result != null && count($result)>0){
            return $result;
        } else {
            return null;
        }
    }

    /**
     * Get ratings by user
     * @param $idUser   user's id
     * @return array|null
     */
    public function getRatingsByUser($idUser){
        $query = "SELECT * FROM `ratings` WHERE `users_id_users` = :idUser";
        $return = $this->db->prepare($query);
        $params = array(':idUser' => $idUser);

        if(!$return->execute($params)){
            return null;
        }
        $result = $return->fetchAll();

        if($result != null){
            return $result;
        }else{
            return null;
        }
    }

    /**
     * Returns ratings by post
     * @param $idPost   id of the post
     * @return array|null
     */
    public function getRatingsByPost($idPost){
        $query = "SELECT * FROM `ratings` WHERE `posts_id_posts` = :idPost";
        $return = $this->db->prepare($query);
        $params = array(':idPost' => $idPost);

        if(!$return->execute($params)){
            return null;
        }
        $result = $return->fetchAll();

        if($result != null){
            return $result;
        }else{
            return null;
        }
    }

    /**
     * Returns rating
     * @param $idUser   user's id
     * @param $idPost   id of the post
     * @return null
     */
    public function getRating($idUser, $idPost){
        $query = "SELECT * FROM `ratings` WHERE `users_id_users` = :idUser AND `posts_id_posts` = :idPost;";
        $return = $this->db->prepare($query);
        $params = array(':idUser' => $idUser, ':idPost' => $idPost);

        if(!$return->execute($params)){
            return null;
        }
        $result = $return->fetchAll();

        if($result != null){
            return $result[0];
        }else{
            return null;
        }
    }

    /**
     * Get average rating of the post
     * @param $idUser   user's id
     * @param $idPost   id of the post
     * @return null|string
     */
    public function getAvgRating($idUser, $idPost){
        $result = $this->getRating($idUser, $idPost);
        if($result != null){
            $return = ($result["originality"] + $result["topic"] + $result["language_level"])/3;
            return number_format($return, 2);
        }
        return null;
    }

    /**
     * Publishes the post
     * @param $idPost   id of the post
     */
    public function publishPost($idPost){
        $query = "UPDATE `posts` SET `published` = '1' WHERE `posts`.`id_posts` = :idPost;";
        $return = $this->db->prepare($query);
        $params = array(':idPost' => $idPost);

        $return->execute($params);

    }

    /**
     * Denys the post
     * @param $idPost   id of the post
     */
    public function denyPost($idPost){
        $query = "UPDATE `posts` SET `published` = '2' WHERE `posts`.`id_posts` = :idPost;";
        $return = $this->db->prepare($query);
        $params = array(':idPost' => $idPost);

        $return->execute($params);

    }
}