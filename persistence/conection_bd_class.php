<?php
    class connectBD extends PDO
    {
        private static $inst = null;

        public function connectBD($dns, $user, $pass)
        {
            parent:: __construct($dns, $user, $pass);
        }

        public function getInstance()
        {
            if(!isset(self::$inst))
            {
                try
                {
                    self::$inst = new connectBD("mysql:dbname=id15316399_projeto; host=localhost", "id15316399_root", "145236987{Moises11}");
                }
                catch(PDOException $e)
                {
                    return "Erro ao conectar!" . $e;
                }
            }
            return self::$inst;
        }
    }
?>