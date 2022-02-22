<?php
//include('conexao.class.php');
    
    class Basic {

        public function __construct(){
            try {
                $this->conn = new PDO('mysql:host=localhost; dbname=teste_back_end', 'root', '');
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
              }
        }
        public function create($table, $data){
            foreach($data as $key => $value){
                $colunas[] = "$key";
                $dados[] = ":$key"; 
            }
            $colunas = implode(', ', $colunas);
            $dados = implode(', ', $dados); 
            $sql = "INSERT INTO `$table` ($colunas) VALUE ($dados)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($data);

            return $this->conn->lastInsertId();
        }
            
        public function list($table){
            $data = $this->conn->query("SELECT * FROM $table")->fetchAll();
            return $data;
        }        

        public function selectById($table, $id){
            $stmt = $this->conn->prepare("SELECT * FROM $table WHERE id=:id");
            $stmt->execute(['id' => $id]); 
            $user = $stmt->fetch();
            return $user;
        }
        public function getCidades($table, $id){ //retorna as cidades no ajax
            $stmt = $this->conn->prepare("SELECT * FROM $table WHERE estado_id = :id");
            $stmt->execute(['id' => $id]); 
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($data);
        }
        public function listCidades($table, $id){ //retorna as cidades no edit
            $stmt = $this->conn->prepare("SELECT * FROM $table WHERE estado_id = :id");
            $stmt->execute(['id' => $id]); 
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    
        public function edit($table, $data, $id){
            foreach($data as $key => $value){
                $dados[] = "$key=:$key"; 
            }
            $dados = implode(', ', $dados); 
            $data['id'] = $id;
            
            $sql = "UPDATE $table SET $dados WHERE id=:id";
        
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($data);
            return $this->conn->lastInsertId();
            
        }

        public function delete($table, $id){
            $this->conn->prepare("DELETE FROM $table WHERE id=?")->execute([$id]);
            header('Location: index.php');
        }
        
        public function view($id){
            $stmt = $this->conn->prepare("SELECT usuarios.nome, usuarios.email, usuarios.endereco_id,
            enderecos.rua, enderecos.numero, enderecos.complemento, enderecos.bairro, enderecos.cep,
            enderecos.estado_id, estados.uf, enderecos.cidade_id,
            cidades.nome as cidade 
            FROM enderecos 
            left join usuarios on 
            usuarios.endereco_id = enderecos.id 
            left join estados on 
            estados.id = enderecos.estado_id 
            left join cidades on 
            cidades.id = enderecos.cidade_id 
            WHERE usuarios.id = :id");

            $stmt->execute(['id' => $id]); 
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $user;
        }

        public function PorEstado(){
            $data = $this->conn->query("SELECT estados.nome as estado, COUNT(estados.nome) as usuarios 
            FROM enderecos 
            left join usuarios on usuarios.endereco_id = enderecos.id 
            left join estados on estados.id = enderecos.estado_id 
            GROUP BY estados.nome 
            HAVING COUNT(estados.nome)")->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        
        public function PorCidade(){
            $data = $this->conn->query("SELECT cidades.nome as cidade, COUNT(cidades.nome) as usuarios 
            FROM enderecos 
            left join usuarios on usuarios.endereco_id = enderecos.id 
            left join cidades on cidades.id = enderecos.cidade_id 
            GROUP BY cidades.nome 
            HAVING COUNT(cidades.nome)")->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

    }

?>
