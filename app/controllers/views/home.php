<?php $this->layout("master"); ?>
<?php $this->start("home"); ?>
<h1><a href="/">HOME</a></h1>
<a href="/create">Criar</a>
<a href="/delete">Deletar</a>
<a href="/update">Atualizar</a>
<a href="/list">Listar</a>
<form action="/list" method="post">
    <input type="text" name="userSearch" placeholder="O que deseja buscar?" required>
    <button type="submit">Enviar</button>
</form>
<?php $this->stop(); ?>

