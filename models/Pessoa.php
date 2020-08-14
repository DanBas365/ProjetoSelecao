<?php
class Pessoa extends model{

    //insere um novo registro no banco de dados.
    public function Cadastrar($nome, $cpf, $dtnasc, $email){

        $sql = $this->db->prepare("SELECT id FROM pessoa WHERE cpf = :cpf");
        $sql->bindValue(":cpf", $cpf);
        
        $sql->execute();

        if($sql->rowCount() == 0){
            $sql = $this->db->prepare("INSERT INTO pessoa SET nome = :nome, cpf = :cpf, email = :email, dtNasc = :dtnasc");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":cpf", $cpf);
            $sql->bindValue(":dtnasc", $dtnasc);
            $sql->bindValue(":email", $email);

            $sql->execute();
            return true;
        } else{
            return false;
        }
    }

    //puxa do banco uma única pessoa, pelo ID
    public function getPessoa($id){

        $sql = $this->db->prepare("SELECT * FROM pessoa WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        $dados = array();
        if($sql->rowCount() > 0){
            $dados = $sql->fetch();
        }
        return $dados;
    }

    //salva alterações realizadas pelo usuário no cadastro da Pessoa
    public function EditaPessoa($nome, $cpf, $dtnasc, $email, $id){

        $sql = $this->db->prepare("UPDATE pessoa SET nome = :nome, cpf = :cpf, dtNasc = :dtnasc, email = :email WHERE id = :id");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":cpf", $cpf);
        $sql->bindValue(":dtnasc", $dtnasc);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":id", $id);
        $sql->execute();

        return true;
    }

    //puxa a lista de todos os registros na tabela
    public function getListaPessoas($filtros = array()){

        $filtrostring = array('1=1');
        if(!empty($filtros['pesqNome'])){
            $filtrostring[] = 'p.nome like :nome';
        }
        if(!empty($filtros['pesqCPF'])){
            $filtrostring[] = 'p.cpf = :cpf';
        }
        $sql = $this->db->prepare("SELECT
                                        p.id,
                                        p.nome,
                                        p.email,
                                        p.cpf,
                                        p.dtnasc,
                                        COUNT(t.id) as QtdFones
                                    FROM
                                        pessoa p
                                    LEFT OUTER JOIN 
                                        telefone t
                                    ON t.id_pessoa = p.id
                                    WHERE ".implode(' AND ', $filtrostring)."
                                    GROUP BY
                                    p.id,p.nome,p.email,p.cpf,p.dtnasc");
        if(!empty($filtros['pesqNome'])){
            $sql->bindValue(":nome", "%".$filtros['pesqNome']."%");
        }
        if(!empty($filtros['pesqCPF'])){
            $sql->bindValue(":cpf", $filtros['pesqCPF']);
        }
        $sql->execute();

        $dados = array();
        if($sql->rowCount() > 0){
            $dados = $sql->fetchAll();
       }
        return $dados;
    }

    //remove o registro no banco baseado no ID
    public function RemoverPessoa($id){

        $sql = $this->db->prepare("SELECT * FROM pessoa WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $this->db->prepare("DELETE FROM pessoa WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();

            return true;
        } else{
            return false;
        }
    }
}
?>