<?php
    class Message
    {
        private $username;
        private $message;
        private $date;
        public function __construct( $username, $message, $date)
        {
            $this->username = $username;
            $this->message = $message;
            $this->date = $date;
        }
        public function isValid (): bool
        {
            return mb_strlen($this->username,"UTF-8")>=3 && mb_strlen($this->message,"UTF-8")>=10;
        }
        public function getError() : array
        {
            $tab;
            if(mb_strlen($this->username,"UTF-8")<3)
            {
                $tab['username'] ="Votre pseudo est trop court";
            }
            if(mb_strlen($this->message,"UTF-8")<10)
            {
                $tab['message'] ="Votre message est trop court";
            }
            return $tab;
        }
        public function toHtml () : string
        {
            $date = date('d M o à H:i',$this->date);
            $user=htmlentities($this->username);
            $mes=nl2br(htmlentities($this->message));
            return<<<HTML
            <P>
                <strong>$user</strong> le <em>$date</em>  <br>
                $mes
            </P>
HTML;
        }
        public function toJson()
        {
            return json_encode([
                'username' =>  $this->username,
                'message' =>  $this->message,
                'date' => $this->date
                ]
            );
        }
        public static function fromJson ($message) : Message
        {
            $decode = json_decode($message,true);
            return new Message($decode["username"],$decode["message"],$decode["date"]);
        }
    }
?>
