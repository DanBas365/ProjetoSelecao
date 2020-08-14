<div class="container">
    <div class="row">
        <h3>Cadastrar Pessoa</h3>
    </div>
    <?php
        if (!empty($msg)) {
            echo $msg;
            $msg = '';
        }
    ?>
    <div class="row">
        <form method="POST">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" maxlength="50" class="form-control" />
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" id="cpf" maxlength="11" class="form-control" />
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" maxlength="50" class="form-control" />
            </div>
            <div class="form-group">
                <label for="dtnasc">Nascimento:</label>
                <input type="date" name="dtnasc" id="dtnasc" class="form-control" />
            </div>

            <input type="submit" value="Cadastrar" class="btn btn-default" />
        </form>
    </div>
</div>