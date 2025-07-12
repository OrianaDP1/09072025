<?php  
    require_once './config/DB.php';
    require_once 'Cliente.php';

    class ClienteModel{
        private $db;
        public function __construct(){
            $this->db=DB::conectar();
        }

        public function guardar(Cliente $cliente) {
            $sql = "INSERT INTO cliente (empresa, RUC, nombres, apellidos, dni, numerotel, nacionalidad, creadordecliente, ultimocontrato, encontrato)
                    VALUES (:e, :r, :n, :a, :d, :nt, :na, :c, :uc, :ec, :en)";
            $ps = $this->db->prepare($sql);
            $ps->bindParam(":e", $cliente->getEmpresa());
            $ps->bindParam(":r", $cliente->getRUC());
            $ps->bindParam(":n", $cliente->getNombres());
            $ps->bindParam(":a", $cliente->getApellidos());
            $ps->bindParam(":d", $cliente->getDni());
            $ps->bindParam(":nt", $cliente->getNumerotel());
            $ps->bindParam(":na", $cliente->getNacionalidad());
            $ps->bindParam(":c", $cliente->getCreadordecliente());
            $ps->bindParam(":uc", $cliente->getUltimocontrato());
            $ps->bindParam(":en", $cliente->getEncontrato());
            $ps->execute();
        }

        public function cargar(){
            $sql = "SELECT idcliente, empresa, RUC, nombres, apellidos, dni, fechacreacion, numerotel, nacionalidad, creadordecliente, ultimocontrato, encontrato FROM cliente";
            $ps=$this->db->prepare($sql);
            $ps->execute();
            $filas=$ps->fetchall();
            $clientes=array();
            foreach($filas as $f){
                $fam = new Cliente();
                $fam->setIdcliente($f[0]);
                $fam->setEmpresa($f[1]);
                $fam->setRUC($f[2]);
                $fam->setNombres($f[3]);
                $fam->setApellidos($f[4]);
                $fam->setDni($f[5]);
                $fam->setFechacreacion($f[6]);
                $fam->setNumerotel($f[7]);
                $fam->setNacionalidad($f[8]);
                $fam->setCreadordecliente($f[9]);
                $fam->setUltimocontrato($f[10]);
                $fam->setEncontrato($f[11]);
                array_push($clientes, $fam);
            }
            return $clientes;
        }
        
        public function borrar($idcli){
            $sql="delete from cliente where idcliente=:idcli";
            $ps=$this->db->prepare($sql);
            $ps->bindParam(':idcli', $idcli);
            $ps->execute();
        }

    }
?>