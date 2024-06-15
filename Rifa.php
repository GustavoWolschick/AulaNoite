<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de temperatura</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="rifa.css">
</head>
<header class="header">
    <a href="index.php">
        <h1>Projeto PHP</h1>
    </a>
</header>
<br><br>

<body>
    <div class="container">
        <form action="rifa.php" method="POST">
            <h1>Rifa</h1>
            <label for="premio">Prêmio:</label>
            <input type="text" name="premio"><br><br>

            <label for="valor">Valor:</label>
            <input type="text" name="valor"><br><br>

            <label for="quantNum">Quantidade:</label>
            <input type="text" name="quantNum"><br><br>

            <label for="img">Imagem:</label>
            <input type="url" name="img"><br><br>

            <br>

            <input type="submit" value="Criar">
            <input type="reset" value="Limpar"><br>
        </form>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['premio']) || isset($_POST['valor']) || isset($_POST['quantNum'])) {
            $premio = $_POST['premio'];
            $valor = $_POST['valor'];
            $quantNum = $_POST['quantNum'];
            $img = $_POST['img'];

            $erro = (empty($premio) || empty($valor) || empty($quantNum)) ?
                "O campo é obrigatórios" : (($valor < 0 || $quantNum < 0) ?
                    "Por favor, insira valores válidos" : "");
            if ($erro) {
                echo $erro;
            } else { 
                echo "<table>";
                for ($i = 1; $i <= $quantNum; $i++) {
                   
                    echo"<tr class='esquerdo'>
                        <td class='esq'>
                            <p>Número: $i<br></p>
                            <p>Valor: R$$valor<br></p>
                            <p>Nome:..............<br></p>
                            <p>Telefone:..........<br></p>
                        </td>
                        <td class='mei'>
                        <div class='texto'>
                            <p>Ação entre amigos<br></p>
                            <p>Número: $i<br></p>
                            <p>Prêmio: $premio<br></p>
                            </div>
                            <div class='image'>
                            <img src='$img'>
                            </div>
                        </td>
                    </tr>
                ";
                }
                echo"</table>";
            }
        } else {
            echo "Formulário não enviado corretamente";
        }
    }
    ?>
    <footer>
        Copyright Gustavo R. Wolschick | 2024
    </footer>

</body>

</html>