<?php $this->layout("master"); ?>
<?php $this->start("home"); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <h1 class="navbar-brand">
            <a href="/" class="text-decoration-none">HOME</a>
        </h1>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex align-items-center">
                <li class="nav-item me-3">
                    <a href="/create" class="nav-link">Criar</a>
                </li>
                <li class="nav-item me-3">
                    <a href="/list" class="nav-link">Listar</a>
                </li>
            </ul>
            <form action="/list" method="post" class="d-flex">
                <input class="form-control me-2" type="text" name="userSearch" placeholder="O que deseja buscar?" required>
                <button class="btn btn-outline-primary" type="submit">Enviar</button>
            </form>
        </div>
    </div>
</nav>


<?php $this->stop(); ?>

