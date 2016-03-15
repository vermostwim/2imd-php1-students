<?php
include_once "Db.class.php";
class User
{
    private $m_sEmail;
    private $m_sPassword;
    private $m_sName;

    function __SET($p_sProperty, $p_vValue)
    {
        switch ($p_sProperty){
            case "Email":
                $this->m_sEmail = $p_vValue;
                break;
            case "Password":
                $this->m_sPassword = $p_vValue;
                break;
            case "Name":
                $this->m_sName = $p_vValue;
                break;
        }
    }

    public function register()
    {
        try
        {
            $new_password = password_hash($this->m_sPassword, PASSWORD_DEFAULT);
            $conn = Db::getInstance();
            $stmt = $conn->prepare("INSERT INTO users(email, password, name)
                                                       VALUES(:email, :password, :name)");

            $stmt->bindparam(":email", $this->m_sEmail);
            $stmt->bindparam(":password", $new_password);
            $stmt->bindparam(":name", $this->m_sName);
            if($stmt->execute()){
                return true;
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function login($p_email, $p_password)
    {
        try
        {
            $conn = Db::getInstance();
            $stmt = $conn->prepare("SELECT * FROM users WHERE email=:email");
            $stmt->bindparam(":email", $p_email);
            $stmt->execute();
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0)
            {
                if(password_verify($p_password, $userRow['password']))
                {
                    session_start();
                    $_SESSION['user_session'] = $userRow['email'];
                    $_SESSION['id'] = $userRow['id'];
                    $_SESSION['name'] = $userRow['name'];
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}
?>