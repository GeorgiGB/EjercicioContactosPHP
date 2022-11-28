<?php 
class Contact {
    private $name;
    private $surname;
    private $email;
    private $phone;
    public function __construct($name,$surname,$email,$phone) {
        $this->name=$name;
        $this->surname=$surname;
        $this->email=$email;
        $this->phone=$phone;
    }
    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of surname
     */ 
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set the value of surname
     *
     * @return  self
     */ 
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }
}
class Table {
    private $caption;
    private array $titles;
    private array $data;
    

    /**
     * Get the value of caption
     */ 
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Set the value of caption
     *
     * @return  self
     */ 
    public function setCaption($caption)
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * Get the value of titles
     */ 
    public function getTitles()
    {
        return $this->titles;
    }

    /**
     * Set the value of titles
     *
     * @return  self
     */ 
    public function setTitles($titles)
    {
        $this->titles = $titles;

        return $this;
    }

    /**
     * Get the value of data
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */ 
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
    public function addRow($contacte) {
        $this->data[]=$contacte;
    }
    public function deleteRow($row) {
        unset($this->data[$row]);
    }
    public function updateRow($row,$contacte) {
        $this->data[$row]=$contacte;
    }
    public function getContact($row) {
        return $this->data[$row];
    }
    public function drawHeader() {
       echo "<caption>".$this->caption."</caption>";
       echo "<tr>";
       foreach($this->titles as $position=>$title) {
        echo "<th><a href='reorder.php?column=$title'>$title</a></th>";
       }
       echo "</tr>"; 
    }
    public function drawRows($filter,$filterString) {
        foreach($this->data as $key=>$contacte) {
            if($filter==0 || 
              ($filter==1 && strpos($contacte->getName(),$filterString)!==false) ||
              ($filter==2 && strpos($contacte->getSurname(),$filterString)!==false) ||
              ($filter==3 && strpos($contacte->getEmail(),$filterString)!==false) ||
              ($filter==4 && strpos($contacte->getPhone(),$filterString)!==false))
               {
            echo "<tr>";
            echo "<td>".$contacte->getName()."</td>";
            echo "<td>".$contacte->getSurname()."</td>";
            echo "<td>".$contacte->getEmail()."</td>";
            echo "<td>".$contacte->getPhone()."</td>";
            echo "<td><a href='deleteRow.php?row=$key'>Delete contact</a></td>";
            echo "<td><a href='updateRow.php?row=$key'>Update contact</a></td>";
            echo "</tr>";
            }
        }
    }
    public function drawTable($filter,$filterString) {
        $this->drawHeader();
        $this->drawRows($filter,$filterString);
    }
    public function reorder($column) {
        $f="get".$column;
        usort($this->data,function($a,$b) use($f) {
            return strcmp($a->$f(),$b->$f());
        });
    }
}
?>