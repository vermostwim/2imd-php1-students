<?php
    include_once "Db.class.php";
    class Tweet
    {

        private $id;
        private $tweet;

        public function __set($p_sProperty, $p_vValue){

            switch ($p_sProperty){
                case "id":
                    $this->id = $p_vValue;
                    break;
                case "tweet":
                    $this->tweet = $p_vValue;
                    break;
            }

        }

        public function __get( $p_sProperty){

            switch ($p_sProperty){
                case "id":
                    return $this->id;
                    break;
                case "tweet":
                    return $this->tweet;
                    break;
            }

        }

        public function save()
        {
                try {
                    $conn = Db::getInstance();
                    $stmt = $conn->prepare("INSERT INTO tweet(post, userid) VALUES(:post, :userid)");
                    $stmt->bindparam(":post", $this->tweet);
                    $stmt->bindparam(":userid", $this->id);
                    $stmt->execute();
                    return true;
                }
                catch(PDOException $e)
                {
                    echo $e->getMessage();
                }
        }

        public function getAll($p_id){
            try {
                $conn = Db::getInstance();
                $posts = $conn->query("SELECT `post` FROM `tweet` WHERE `userid` = '" . $p_id . "'ORDER BY `id` DESC");
                return $posts;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

    }
?>