<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de temperatura</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="temperatura.css">
</head>
<header class="header">
    <a href="index.php">
    <h1>Projeto PHP</h1>
    </a>
</header>
<br><br>
<body>
    <div class="container">
        <h1>Converter Temperatura</h1>
        <form action="Temperatura.php" Method="POST">
            <label for="temperatura">Informe uma temperatura:</label><br>
            <input type="number" id="temperatura" name="temperatura" step="0.01" required> <br><br>
            <select name="de_temperatura" id="de_temperatura">
                <option value="celsius">Celsius</option>
                <option value="fahrenheit">Fahrenheit</option>
            </select>
            <select name="para_temperatura" id="para_temperatura">
                <option value="celsius">Celsius</option>
                <option value="fahrenheit">Fahrenheit</option>
            </select><br><br>
            <input type="submit" value="Converter">
            <input type="reset" value="limpar"> <br><br>
        </form>
        <div class="resposta">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") { if (isset($_POST['temperatura']) && isset($_POST['de_temperatura'])&& isset($_POST['para_temperatura'])) {
                $temperatura = $_POST['temperatura'];
                $de = $_POST['de_temperatura'];
                $para = $_POST['para_temperatura'];
                $erro = empty($temperatura) ? "obrigatório informar uma temperatura" : ((!is_numeric($temperatura)) ? "Por favor, insira uma temperatura válida" : "");
                if ($erro) {
                    echo $erro;
                } else {
                  if($de == "celsius" && $para == "fahrenheit"){
                    $resultado = ($temperatura * 9/5) + 32;
                    echo "A temperatura $temperatura °C é igual a $resultado °F";
                  }elseif($de == "fahrenheit" && $para == "celsius"){
                    $resultado = ($temperatura - 32) * 5/9;
                    echo "A temperatura $temperatura °F é igual a $resultado °C";
                  }else{
                    echo "A temperatura $temperatura $de";
                  }
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