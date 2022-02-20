<?php
include('conexao.class.php');
    
    class Basic extends Conexao{

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

            header('Location: index.php');
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
    
        public function edit($table, $data, $id){
            foreach($data as $key => $value){
                $dados[] = "$key=:$key"; 
            }
            $dados = implode(', ', $dados); 
            $data['id'] = $id;

            $sql = "UPDATE $table SET $dados WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($data);

            header('Location: index.php');
        }

        public function delete($table, $id){
            $this->conn->prepare("DELETE FROM $table WHERE id=?")->execute([$id]);
            header('Location: index.php');
        }
         
            //echo '<pre>';
            //print_r($data);
            //die();
    }

?>
