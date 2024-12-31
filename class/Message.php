<?php
    class Message
    {
        $username;
        $message;
        $date;
        public function __construct($username,$message,$date)
        {
            $this->username = $username;
            $this->message = $message;
            $this->date = $date;
        }
        public function isValid (): bool
        {
            return mb_strlen($this->username,"UTF-8")>=3 || mb_strlen($this->message,"UTF-8")>=10
        }
        public function
    }
?>