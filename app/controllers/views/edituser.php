<?php $this->layout("home");?>

<?php $this->start("update"); ?>
<div class="container mt-4">
    <h1 class="mb-3">Editar Cadastro</h1>
    <h3 class="mb-4">Insira as informações</h3>
    <form action="/userupdate" method="post" class="d-flex flex-column gap-3">
        <div class="d-flex flex-column flex-md-row gap-3">
            <input type="hidden" name="id" value="<?= htmlspecialchars($user->ID) ?>">
            <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($user->nome) ?>">
            <input type="email" name="email" class="form-control" placeholder="Informe email" value="<?= $user->email ?>">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
<?php $this->stop(); ?>
