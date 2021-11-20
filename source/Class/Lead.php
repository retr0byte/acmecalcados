<?php
    namespace Source\Class;

    use PDO;
    use Source\Class\MysqlCRUD;
    class Lead{
        //Atributos
        private $ds_email;

        //Metodos
        public function set_ds_email($ds_email){
            $this->ds_email = $ds_email;
        }

        public function enviarEmail(){
            $mysql = new MysqlCRUD();
            $comando = $mysql->insertOnDB('Leads',['ds_Email'],[$this->ds_email]);

            if($comando) {
                return [
                    "status" => 200,
                    "message" => "sucesso"
                ];
            }
            else {
                return [
                    "status" => 500,
                    "message" => "erro"
                ];
            }
        }
    }
?>