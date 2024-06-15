<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de temperatura</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="moedas.css">
</head>
<header class="header">
    <a href="index.php">
    <h1>Projeto PHP</h1>
    </a>
</header>
<br><br>
<body>
    <div class="container">
    <h1>Converter moeda</h1>
    <form action="Moedas.php" method="POST">
        <div class="depara">
        <label for="moeda_origem">De:</label>
        <select name="moeda_origem" id="moeda_origem">
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
            <option value="BRL">BRL</option>
        </select>

        <label for="moeda_destino">Para:</label>
        <select name="moeda_destino" id="moeda_destino">
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
            <option value="BRL">BRL</option>
        </select><br><br>
        </div>

        <label for="valor">Valor:</label>
        <input type="number" name="valor" id="valor" step="0.01" required>

        <input type="submit" value="Converter">
        <input type="reset" value="limpar"> <br><br>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $moeda_origem = $_POST['moeda_origem'];
        $moeda_destino = $_POST['moeda_destino'];
        $valor = $_POST['valor'];

        $conversao = [
            'USD' => ['USD' => 1, 'EUR' => 0.85, 'BRL' => 5.20],
            'EUR' => ['USD' => 1.18, 'EUR' => 1, 'BRL' => 6.12],
            'BRL' => ['USD' => 0.19, 'EUR' => 0.16, 'BRL' => 1]
        ];

        if (isset($conversao[$moeda_origem][$moeda_destino])) {
            $taxa = $conversao[$moeda_origem][$moeda_destino];
            $valor_convertido = $valor * $taxa;

            $simbolos = [
                'USD' => '$',
                'EUR' => '€',
                'BRL' => 'R$'
            ];

            $simbolo = $simbolos[$moeda_destino];
            echo "<p>Valor convertido: {$simbolo} " . number_format($valor_convertido, 2) . "</p>";
        } else {
            echo "<p>Conversão não disponível.</p>";
        }
    }
    ?>
</div>
<footer>
    Copyright Gustavo R. Wolschick | 2024
</footer>
</body>

</html>