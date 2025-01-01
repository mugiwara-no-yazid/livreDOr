<?php
require_once __DIR__ . DIRECTORY_SEPARATOR ."Message.php";
class LivreDOr
{
    private $fic;
    public function __construct($fic)
    {
        $this->fic = $fic;
    }
    public function addMessage(Message $message)
    {
        if(!file_exists($this->fic))
        {
            $resource  = fopen($this->fic,'x+');
        }
        else
        {
            $resource = fopen($this->fic,'a');
        }
        fwrite($resource,$message->toJson().PHP_EOL);
        fclose($resource);
    }
    public function getMessage()
    {
        $tabMessage = [];
        if (file_exists($this->fic))
        {
            $resource = fopen($this->fic,'r');
            while($line = fgets($resource))
            {
             array_push($tabMessage,$line);  
            }
        }   
        return array_reverse($tabMessage);
    }
}
?>