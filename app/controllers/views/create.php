<?php $this->layout("home");?>

<?php $this->start("create"); ?>
<h1>Novo Cadastro</h1>

<h3>Insira as informações</h3>
<form action="/create" method="post">
    <input type="text" name="nome" placeholder="informe o nome">
    <input type="email" name="email" placeholder="Informe email">
    <button type="submit">Enviar</button>
</form>
<?php $this->stop(); ?>
