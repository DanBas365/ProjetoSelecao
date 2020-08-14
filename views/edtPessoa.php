<div class="container">
    <div class="row">
        <h3>Editar Pessoa</h3>
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
                <input type="text" name="nome" id="nome" maxlength="50" class="form-control" value="<?php echo $pessoa['nome']; ?>" />
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" id="cpf" maxlength="11" class="form-control" value="<?php echo $pessoa['cpf']; ?>" />
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" maxlength="50" class="form-control" value="<?php echo $pessoa['email']; ?>" />
            </div>
            <div class="form-group">
                <label for="dtnasc">Nascimento:</label>
                <input type="date" name="dtnasc" id="dtnasc" class="form-control" data-date data-date-format="yyyy-mm-dd" value="<?php echo $pessoa['dtNasc']; ?>" />
            </div>
            <input type="hidden" name="id" value="<?php echo $pessoa['id']; ?>" />

            <input type="submit" value="Salvar Alterações" class="btn btn-info" />
            <a href="<?php echo BASE_URL; ?>" class="btn btn-primary">Cancelar</a>
        </form>
    </div>
</div>