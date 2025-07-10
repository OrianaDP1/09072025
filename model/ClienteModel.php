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
            $sql="select * from cliente";
            $ps=$this->db->prepare($sql);
            $ps->execute();
            $filas=$ps->fetchall();
            $clientes=array();
            foreach($filas as $f){
                $fam=new Cliente();
                $fam->setIdcliente($f[0]);
                $fam->setEmpresa($f[1]);
                $fam->setNombres($f[2]);
                $fam->setApellidos($f[3]);
                $fam->setDni($f[4]);
                $fam->setFechacreacion($f[5]);
                $fam->setNumerotel($f[6]);
                $fam->setNacionalidad($f[7]);
                $fam->setCreadordecliente($f[8]);
                $fam->setUltimocontrato($f[9]);
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