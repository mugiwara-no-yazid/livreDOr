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
        public function toHtml () : string
        {
            return<<<HTML
            <P>
                <strong>$this->username</strong> <em> date('D d M o / H : i : s',$this->date) </em>  <br>
                $this->message;
            </P>
HTML
        }
        public function toJson()
        {
            $tabMessage = [
                'username' =>  $this->username,
                'message' =>  $this->message,
                'date' => $this->date
                ];
            return json_encode($tabMessage);
        }
        public static function Mess ()
    }
?>
