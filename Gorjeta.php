<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de gorjeta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="gorjeta.css">
</head>
<header class="header">
    <a href="index.php">
    <h1>Projeto PHP</h1>
    </a>
</header>
<br><br>
<body>
    <div class="container">
        <h1>Calcular gorjeta</h1>
        <form action="Gorjeta.php" Method="POST">
            <label for="valor">Informe um valor:</label><br>
            <input type="number" id="valor" name="valor" step="0.01" required> <br><br>
            <label for="porcentagem">Percentual de gorjeta %:</label><br>
            <input type="number" id="porcentagem" name="porcentagem" min="0"> <br><br>
            <input type="submit" value="Calcular gorjeta">
            <input type="reset" value="limpar"> <br><br>
        </form>
        <div class="resposta">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") { if (isset($_POST['valor']) && isset($_POST['porcentagem'])) {
                $porcentagem = $_POST['porcentagem'];
                $valor = $_POST['valor'];
                $erro = empty($valor) || empty($porcentagem) ? "todos os campos são  obrigatórios" : ((!is_numeric($valor) || $valor <= 0 || $porcentagem <= 0) ? "Por favor, insira valores válidos para valor e gorjeta" : "");
                if ($erro) {
                    echo $erro;
                } else {
                    $resultado = $valor*$porcentagem/100;
        
                    echo "Adicionando $porcentagem% de gorjeta ao valor de R$" .number_format($valor,2);
                    echo "<br>O valor total a ser pago é de R$ ".number_format($valor+$resultado,2);
                }
            } else {
                echo "Formulário não informado corretamente";
            }
        } ?>
    </div>
</div>
<footer>
    Copyright Gustavo R. Wolschick | 2024
</footer>
</body>

</html>