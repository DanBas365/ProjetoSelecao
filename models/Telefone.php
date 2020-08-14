<?php
class Telefone extends model{

    //insere um novo registro de telefone no banco, associado a uma pessoa existente
    public function Cadastrar($ddd, $numero, $id){

        $sql = $this->db->prepare("SELECT * FROM telefone WHERE DDD = :ddd, Numero = :numero, id_pessoa = :id");
        $sql->bindValue(":ddd", $ddd);
        $sql->bindValue(":numero", $numero);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() == 0){    
            $sql = $this->db->prepare("INSERT INTO telefone SET DDD = :ddd, Numero = :numero, id_pessoa = :id");
            $sql->bindValue(":ddd", $ddd);
            $sql->bindValue(":numero", $numero);
            $sql->bindValue(":id", $id);
            $sql->execute();

            return true;
        } else{
            return false;
        }
    }
     
    //puxa a lista de telefones associados à pessoa
    public function getListaTelefones($id){

        $sql = $this->db->prepare("SELECT * FROM telefone WHERE id_pessoa = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        $dados = array();
        if($sql->rowCount() > 0){

            $dados = $sql->fetchAll();
        }
        return $dados;
    }

    //remove o telefone especificado
    public function Remover($id){

        $sql = $this->db->prepare("SELECT id_pessoa FROM telefone WHERE ID = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        $id_pessoa = $sql->fetch();

        if($sql->rowCount() > 0){

            $sql = $this->db->prepare("DELETE FROM telefone WHERE ID = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();
            
            $id = $id_pessoa['id_pessoa'];

            return $id;
        } else{
            return false;
        }
    }

    //remove um conjunto de telefones com base no id_pessoa
    public function RemoverTelefones($id){

        $sql = $this->db->prepare("SELECT * FROM telefone WHERE id_pessoa = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){

            $sql = $this->db->prepare("DELETE FROM telefone WHERE id_pessoa = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();

            return true;
        } else{
            return false;
        }
    }
}
?>