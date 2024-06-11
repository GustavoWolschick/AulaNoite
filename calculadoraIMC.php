<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>

<body>
    <div class="caixa de texto">
<h1> Calculadora IMC</h1>
<form action="Formularios.php" Method="POST">
<label for="nome">Nome:</label>
<input type="text" id="nome" name="nome"
 required> <br><br>
<label for="Peso">Peso(Kg):</label>
<input type="number" id="peso" name="Peso"
step="0.1" required> <br><br>
<label for="Altura">Altura(m):</label>
<input type="number" id="altura" name="Altura"
step="0.01" required> <br><br>
<label for="Idade">Ano de nascimento:</label>
<input type="number" id="idade" name="Idade" min="1900" max="2024">  <br><br>
<input type="submit" value="Calcular IMC">
<input type="reset" value="limpar"> <br><br>
</form>
</div>
<div class="resposta">
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['Peso'])&& isset($_POST['Altura'])){
        $hoje = date('Y');
        $nome = $_POST['nome'];
        $anoAtual = $_POST['Idade'];
        $peso = $_POST['Peso'];
        $altura = $_POST['Altura'];
        $erro = empty($peso) || empty($altura)? "todos os campos são  obrigatórios":
        ((!is_numeric($altura) || $peso <= 0 || $altura <=0)? "Por favor, insira valores válidos para peso e altura": "");
        if($erro){
            echo $erro;
        }else{  
            $anoAtual = $hoje - $anoAtual;
            $imc = $peso / ($altura * $altura);
            $imc = number_format($imc, 2);
            $clasificacao = ($imc < 18.5)? "Abaixo do peso": (($imc < 24.9)? "Peso normal": (($imc < 29.9)? "Sobrepeso": "Obesidade"));
            echo "Olá, $nome! <br>";
            echo "Sua idade é $anoAtual anos. <br>";
            echo "Seu IMC é: $imc. <br>";
            echo "Sua classificação é: $clasificacao.";
        }}else{echo"Formulário não informado corretamente";}
}?>
</div>
</body>
</html>
