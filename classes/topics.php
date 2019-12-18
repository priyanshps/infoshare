<?php

    class topics extends database
    {
        public function getData()
        {
            $sql='SELECT * FROM topics';
            $this->query($sql);
            $i=0;
            while($rows=$this->resultset())
            {
                if($i<count($rows))
                {
                    yield $rows[$i];
                    $i++;
                }
                else
                {
                    return count($rows).' Quotes Listed ';
                }
            }
        }
        public function addtopic($category_id,$user_id,$title,$body)
        {
            try
            {
                $sql="INSERT INTO topics(category_id,userid,title,body) VALUES(:category_id,:userid,:title,:body);";
                $this->query($sql);
                $this->bind(':category_id',$category_id);
                $this->bind(':userid',$user_id);
                $this->bind(':title',$title);
                $this->bind(':body',$body);
                $this->execute();
            }
            catch(Throwable $e)
            {
                echo $e;
            }
            if($this->lastInsertId())
            {
                header('location: index.php');
            }

            
        }
        public function gettopic($id)
        {
            $sql='SELECT * FROM topics WHERE id=:id';
            $this->query($sql);
            $this->bind(':id',$id);
            $row=$this->single();
            return $row;
        }
        public function updatetopic($tid,$category_id,$title,$body)
        {
            try{
            $sql='UPDATE topics SET category_id= :category_id, title= :title, body= :body WHERE id =:id';
            $this->query($sql);
            $this->bind(':category_id',$category_id);
            $this->bind(':title',$title);
            $this->bind(':body',$body);
            $this->bind(':id',$tid);
            $this->execute();
            }
            catch(Throwable $e)
            {
                echo $e;
            }
            header('location: index.php');
        }
        public function delete(int $id)
        {
            try
            {
                $this->query('DELETE FROM topics WHERE id = :id');
                $this->bind(':id',$id);
                $this->execute();
            }catch(Throwable $e)
            {
                echo $e;
            
            }
            header('location: index.php');
        }
    }


?>