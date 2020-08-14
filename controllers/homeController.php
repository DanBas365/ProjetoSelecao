<?php
class homeController extends controller {
	
	public function Index(){
		$dados = array();

		$filtros = array(
			'pesqNome' => '',
			'pesqCPF' => '' 
		);
        
        if(isset($_GET['filtros'])){
            $filtros = $_GET['filtros'];
        }
		$p = new Pessoa();
		$dados['pessoas'] = $p->getListaPessoas($filtros);

		$this->loadTemplate('home', $dados);
	}

	public function Remover($id){
        $dados = array();

        $p = new Pessoa();
        $t = new Telefone();
        if(isset($id) && !empty($id)){

            $t->RemoverTelefones($id);
            $p->RemoverPessoa($id);

            $dados['msg'] = 
            '<div class="row alert-success">
                Cadastro removido com sucesso!
            </div>';
        } else{
            $dados['msg'] = 
            '<div class="row alert-warning">
                Não foi possível realizar a operação.
            </div>';
        }
        
        $dados['pessoas'] = $p->getListaPessoas();
        $this->LoadTemplate('home', $dados);
    }
}
?>