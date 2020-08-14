<div class="container">
    <div class="row">
        <form class="form-inline" method="POST">
            <div class="form-group">
                <label for="ddd">DDD:</label>
                <input type="text" name="ddd" id="ddd" maxlength="2" class="form-control mb-2 mr-sm-2" />
            </div>
            <div class="form-group">
                <label for="fone">Telefone:</label>
                <input type="text" name="fone" id="fone" maxlength="9" class="form-control mb-2 mr-sm-2" />
            </div>
            <input type="hidden" name="idpes" id="idpes" class="form-control mb-2 mr-sm-2" value="<?php echo $idpessoa; ?>" />

            <input type="submit" value="Adicionar" class="btn btn-info mb-2 mr-sm-2" />
        </form>
    </div>
    <?php
        if (!empty($msg)) {
            echo $msg;
            $msg = '';
        }
    ?>
    <div class="row">
        <table class="table table-stripped">
            <th>
                <tr>
                    <td>ID</td>
                    <td>DDD</td>
                    <td>Telefone</td>
                    <td></td>
                </tr>
            </th>
            <tbody>
                <?php foreach ($telefones as $t) : ?>
                    <tr>
                        <td><?php echo $t['id']; ?></td>
                        <td><?php echo $t['ddd']; ?></td>
                        <td><?php echo $t['numero']; ?></td>
                        <td>
                            <a href="<?php echo BASE_URL; ?>pestel/remover/<?php echo $t['id']; ?>" class="btn btn-danger">Remover</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>