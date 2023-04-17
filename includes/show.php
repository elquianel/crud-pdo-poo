<?php
    $msg = '';
    if(isset($_GET['status'])){
        switch ($_GET['status']) {
            case 'success':
                $msg = '<div class="alert alert-success">Ação executada com sucesso!!</div>';
                break;
            case 'error':
                $msg = '<div class="alert alert-danger">Ocorreu algum problema durante a execução!</div>';
                break;
        }
    }
?>

<main>
    <section>
        <?= $msg; ?>
        <a href="register.php">
            <button class="btn btn-success">Nova vaga</button>
        </a>
    </section>

    <section>
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if($vagas): ?>
                    <?php foreach($vagas as $vaga): ?>
                    <tr>
                        <td><?= $vaga->id; ?></td>
                        <td><?= $vaga->title; ?></td>
                        <td><?= $vaga->description; ?></td>
                        <td>
                            <?php if($vaga->status == 'Y'):?>
                                <span class="badge badge-success">Ativo</span>
                            <?php else:?>
                                <span class="badge badge-danger">Inativo</span>
                            <?php endif;?>
                        </td>
                        <td><?= $vaga->date; ?></td>
                        <td>
                            <a href="edit.php?id=<?= $vaga->id;?>" >
                                <button class="btn btn-warning">Editar</button>
                            </a>
                            <a href="delete.php?id=<?= $vaga->id; ?>">
                                <button class="btn btn-danger">Excluir</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                    <strong>Nenhuma vaga ainda cadastrada!! <a href="register.php">Clique aqui para inserir uma.</a></strong>
                <?php endif; ?>
            </tbody>
        </table>
    </section>
</main>