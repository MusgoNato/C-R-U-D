<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C-R-U-D</title>
</head>
<body>  
    <!-- Obrigatorio -->
    <?= $this->section("content") ?>

    <!-- Navegação do site -->
    <div>
        <?= $this->section("home") ?>
    </div>

    <!-- Cadastro do Usuario -->
    <div>
        <?= $this->section("create") ?>
    </div>

    <!-- Listagem -->
    <div>
        <?= $this->section("listarUser") ?>
    </div>
</body>
</html>