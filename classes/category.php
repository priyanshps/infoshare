<?php

    class category extends database
    {
        public function getcat()
        {
            $sql='SELECT * FROM categories';
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
                    return count($row).' Listed ';
                }
            }
        }
    }

?>