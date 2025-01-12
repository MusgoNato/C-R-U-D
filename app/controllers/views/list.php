<?php $this->layout("home");?>
<?php $this->start("listarUser");?>
<h1>Usuários Cadastrados</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>EMAIL</th>
        </tr>
    </thead>

    <tbody>
        <?php if(!empty($usuarios)): ?>
        <?php foreach($usuarios as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['ID']); ?></td>
                <td><?= htmlspecialchars($user['nome']);?></td>
                <td><?= htmlspecialchars($user['email']); ?><td><a href="#">Editar</a></td><td><a href="#">Excluir</a></td></td>                
            </tr>

        <?php endforeach; ?>
        <?php else: ?>
            <b>Nenhum resultado encontrado para sua busca!</b>
        <?php endif; ?>
    </tbody>
</table>

<?php $this->stop(); ?>