<?php





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div>
        <h2>DashCore</h2>

        <a href="http://localhost:8080/vitoria_wanderson/public/logar.php">Sair</a>

    </div>


    <div>


    <form>

        <input type="file" id="arquivo" name="arquivo" accept=".xlsx,.xls,.csv,.ods" required>
        <button type="button" id="CriarGrafico">Criar gráfico</button>

    </form>

        <div>
            <h2>Gráficos</h2>

            <div id="grafico-container">

                <a>Nenhum gráfico adicionado no momento</a>

            </div>
        </div>


        <button>Criar dashboard</button>


    </div>

    
</body>
</html>

