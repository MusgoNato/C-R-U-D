<?php $this->layout("home");?>
<?php $this->start("listarUser");?>
<h1 class="mb-4">Usuários Cadastrados</h1>
<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        <?php if (!empty($usuarios)): ?>
            <?php foreach ($usuarios as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['ID']); ?></td>
                    <td><?= htmlspecialchars($user['nome']); ?></td>
                    <td><?= htmlspecialchars($user['email']); ?></td>
                    <td>
                        <form action="/useraction" method="post" class="d-inline">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($user['ID']) ?>">
                            <button type="submit" name="action" value="edit" class="btn btn-sm btn-warning">Editar</button>
                        </form>
                        <form action="/useraction" method="post" class="d-inline">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($user['ID']) ?>">
                            <button type="submit" name="action" value="delete" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza de que deseja deletar este usuário?');">Deletar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center"><strong>Nenhum usuário encontrado!</strong></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>


<?php $this->stop(); ?>