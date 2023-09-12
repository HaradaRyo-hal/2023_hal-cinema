<?php
    class Db{
        // カプセル化群
        protected $userid;
        protected $pass,$host,$dbname,$port,$dsn;
        protected $db;



        // コンストラクタ
        function __construct($id="root",$pass="root",$host="localhost",$dbname="cinemasys",$port="3306"){
            $this->userid = $id;
            $this->pass = $pass;
            $this->host = $host;
            $this->dbname = $dbname;
            $this->dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8;port={$this->port}";
        }
                
        public function conn(){
            $flag = true;

            try {
            $this->db = new PDO($this->dsn,$this->userid,$this->pass);    
            } catch (PODException $e) {
            $flag = false;
            print "接続エラー".$e->getMessage();
            }
            return $flag;
        }

        public function insertChicket($arg) {
            $stmt = $this->$db->prepare("INSERT INTO t_appointments (f_appointmentid, f_theaterscheduleid, f_completedday, f_userid, f_appointedenable, f_payid, f_ticket) VALUES (:f_appointmentid, :f_theaterscheduleid, :f_completedday, :f_userid, :f_appointedenable, :f_payid, :f_ticket)");
            array_walk($arg, function(&$val, $index) {
                $arg[$index]= htmlspecialchars($val, ENT_QUOTES);
            });
        }

    }
?>