<div class="container">
    <div class="row">
        <form class="form-inline" method="GET">
            <label for="pesqNome">Nome:</label>
            <input type="text" name="filtros[pesqNome]" id="pesqNome" maxlength="30" class="form-control mb-2 mr-sm-2" />

            <label for="pesqCPF">CPF:</label>
            <input type="text" name="filtros[pesqCPF]" id="pesqCPF" maxlength="11" class="form-control mb-2 mr-sm-2" />

            <input type="submit" value="Buscar" class="btn btn-primary mb-2 mr-sm-2" />
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
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>CPF</th>
                    <th>Idade</th>
                    <th>Quantidade de Telefones</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pessoas as $p) : ?>
                    <tr>
                        <td><?php echo $p['id']; ?></td>
                        <td><?php echo $p['nome']; ?></td>
                        <td><?php echo $p['email']; ?></td>
                        <td><?php echo $p['cpf']; ?></td>
                        <td>
                            <?php
                            $from = new DateTime($p['dtnasc']);
                            $to   = new DateTime('today');
                            echo $from->diff($to)->y;
                            ?>
                        </td>
                        <td><?php echo $p['QtdFones']; ?></td>
                        <td>
                            <a href="<?php echo BASE_URL; ?>pestel/editar/<?php echo $p['id']; ?>" class="btn btn-primary">Editar</a> |

                            <a href="<?php echo BASE_URL; ?>pestel/index/<?php echo $p['id']; ?>" class="btn btn-info">Telefones</a> |

                            <a href="<?php echo BASE_URL; ?>home/remover/<?php echo $p['id']; ?>" class="btn btn-danger">Deletar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>