<?php include_once('templates/header.php'); ?>
<div class = "container">
    <?php if(isset($printMsg) && $printMsg != ''):  ?>
        <p id='msg'><?= $printMsg ?></p>
        <?php endif; ?>
        <h1 id="main-title">Atividades</h1>
        <?php if(count($tarefa) > 0): ?>
            <table class="table" id="tarefa-table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Tarefas</th>
                        <th scope="col">Opções</th>
                    </tr>   
                </thead>
                <tbody>
                    <?php foreach($tarefas as $registro): ?>
                        <tr>
                            <td scope="row" class="col-id"><?= $registro["id"] ?></td>
                            <td scope="row"><?= $registro["nome"] ?></td>
                            <td scope="row"><?= $registro["tarefa"] ?></td>
                            <td class="actions">
                                <a href="show.php?id=<?= $registro["id"] ?>">
                                    <i class="fas fa-eye check-icon"></i>
                                </a>
                                <a heref="editar.php?id=<?= $registro["id"] ?>">
                                    <i class="far fa-edit edit-icon"></i>
                                </a>
                                <form action="./config/processa.php" method="POST" class="delete-form">
                                <input type="hidden" name="id" value="<?= $registro["id"] ?>">
                                <input type="hidden" name="type" value="delete">
                                <button type="submit" class="delete-btn">
                                    <i class="fas fa-times delete-icon"></i>
                                </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </table>
                <?php else: ?>
                    <p id="empty-list-text">Ainda não há registro de tarefas,
                        <a href="create.php">Clique aqui para dicionar.</a>
                    </p>
                    <?php endif; ?>
                </div>
            <?php    include_once('templates/footer.php');   ?>