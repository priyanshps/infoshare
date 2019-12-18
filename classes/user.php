<?php
    //TODO add user , add post , login ,logout 

    class user extends database
    {
        public function getLogin($username)
        {
            try
            {
                $sql='SELECT * FROM users where username=:username';
                $this->query($sql);
                $this->bind(':username',$username);
                $row=$this->single();
                return $row;
            }
            catch(Throwable $e)
            {
                echo $e;
            }
            
        }
        public function add($name,$email,$username,$password,$bio)
        {
            try
            {
                $sql='INSERT INTO users(name,email,username,password,about) VALUES(:name,:email,:username,:password,:about)';
                $this->query($sql);
                $this->bind(':name',$name);
                $this->bind(':email',$email);
                $this->bind(':username',$username);
                $this->bind(':password',$password);
                $this->bind(':about',$bio);
                $this->execute();
            }
            catch(Throwable $e)
            {
                echo $e;
            }
            if($this->lastInsertId())
            {
                header('location: login.php');
            }
        }
        public function index()
        {
            try
            {
                $this->query('SELECT * FROM quotes ORDER BY create_date DESC');
                $i=0;
                while($row=$this->resultset())
                {
                    if($i<count($row))
                    {
                        yield $row[$i];
                        $i++;
                    }
                    else
                    {
                        return count($row).' Quates Listed';
                    }
                }
            }
            catch(Throwable $e)
            {
                echo "Error   ".get_class($e).' on line'.$e->getLine().' of '.$e->getFile().' : '.$e->getMessage();
            
            }
        }
    }

?>