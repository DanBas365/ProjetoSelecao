<?php
class pestelController extends controller{

    //faz a ponte entre o modelo e a view para tratar dos telefones de cada pessoa cadastrada
    public function Index($id){
        $dados = array();

        $t = new Telefone();
        if(isset($_POST['ddd']) && !empty($_POST['ddd'])){
            $ddd = addslashes($_POST['ddd']);
            $fone = addslashes($_POST['fone']);
            $idpessoa = $_POST['idpes'];

            if(!empty($fone) && !empty($idpessoa)){
                if($t->Cadastrar($ddd,$fone, $idpessoa)){
                    $dados['msg'] = 
                    '<div class="row alert-success">
                        Telefone adicionado com sucesso
                    </div>';
                } else{
                    $dados['msg'] = 
                    '<div class="row alert-warning">
                        Telefone já cadastrado!!
                    </div>';
                }
            } else{
                $dados['msg'] = 
                '<div class="row alert-warning">
                    Preencha todos os campos!
                </div>';
            }   
        }

        $dados['idpessoa'] = $id;
        $dados['telefones'] = $t->getListaTelefones($id);
        $this->LoadTemplate('telefones', $dados);
    }

    //faz a ponte entre o modelo e a view para Cadastro de novos dados
    public function Cadastrar(){
        $dados = array();
        
        $p = new Pessoa();
        if(isset($_POST['nome']) && !empty($_POST['nome'])){
            $nome = addslashes($_POST['nome']);
            $cpf = addslashes($_POST['cpf']);
            $email = addslashes($_POST['email']);
            $dtnasc = addslashes($_POST['dtnasc']);

            if(!empty($nome) && !empty($cpf) && !empty($email) && !empty($dtnasc)){
                if($p->validaCPF($cpf)){
                    if($p->Cadastrar($nome, $cpf, $dtnasc, $email)){
                        $dados['msg'] = 
                        '<div class="row alert-success">
                            <strong>Parabéns!</strong> Pessoa cadastrada com sucesso.
                        </div>';
                    } else{
                        $dados['msg'] = 
                        '<div class="row alert-warning">
                            Pessoa já cadastrada!!
                        </div>';
                    }
                } else{
                    $dados['msg'] = 
                    '<div class="row alert-warning">
                        CPF inválido!
                    </div>';    
                }
            } else{
                $dados['msg'] = 
                '<div class="row alert-warning">
                    Preencha todos os campos!
                </div>';
            }

                            
        } 
        
        $this->LoadTemplate('cadPessoa', $dados);
    }

    //faz a ponte entre o modelo e a view para Edição dos dados
    public function Editar($id){
        $dados = array();

        $p = new Pessoa();
        if(isset($_POST['nome']) && !empty($_POST['nome'])){
            $nome = addslashes($_POST['nome']);
            $cpf = addslashes($_POST['cpf']);
            $email = addslashes($_POST['email']);
            $dtnasc = addslashes($_POST['dtnasc']);
            $id = $_POST['id'];

            if(!empty($nome) && !empty($cpf) && !empty($email) && !empty($dtnasc)){
                if($p->EditaPessoa($nome, $cpf, $dtnasc, $email, $id)){
                    $dados['msg'] = 
                    '<div class="row alert-success">
                        Alterações salvas.
                    </div>';
                } else{
                    $dados['msg'] = 
                    '<div class="row alert-warning">
                        Erro ao salvar dados.
                    </div>';
                }
            } else{
                $dados['msg'] = 
                '<div class="row alert-warning">
                    Preencha todos os campos!
                </div>';
            }            
        }
        $dados['pessoa'] = $p->getPessoa($id);

        $this->LoadTemplate('edtPessoa', $dados);
    }

    //remove um único telefone de uma pessoa 
    public function Remover($id){
        $dados = array();

        $t = new Telefone();
        if(isset($id) && !empty($id)){
            $idpessoa = $t->Remover($id);

            $dados['msg'] = 
            '<div class="row alert-success">
                Atualizado com sucesso!
            </div>';
        } else{
            $dados['msg'] = 
            '<div class="row alert-warning">
                Não foi possível realizar a operação.
            </div>';
        }

        $dados['idpessoa'] = $idpessoa;
        $dados['telefones'] = $t->getListaTelefones($idpessoa);
        $this->LoadTemplate('telefones', $dados);
    }

}
?>