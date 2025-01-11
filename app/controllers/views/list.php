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
        <?php foreach($usuarios as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['ID']); ?></td>
                <td><?= htmlspecialchars($user['nome']);?></td>
                <td><?= htmlspecialchars($user['email']); ?></td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>

<?php $this->stop(); ?>