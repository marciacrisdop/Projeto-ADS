
<?php
    require("conecta.php");

    $nome = $_POST['nome'];
    $re =  $_POST['re'];
    $placa = $_POST['placa'];
    $datahora = $_POST['datahora'];
    $tipo = $_POST['tipo'];
    $finalidade = $_POST['finalidade'];
    $especificacao = $_POST['especificacao'];
    $descricao = $_POST['descricao'];

    $sql = "INSERT INTO veiculo (nome, re, placa, datahora, tipo, finalidade, especificacao, descricao)
    VALUES ('$nome', '$re', '$placa', '$datahora', '$tipo', '$finalidade', '$especificacao', '$descricao')";

    if ($conn->query($sql) === TRUE) {
      echo "<center><h1>Registro Inserido com Sucesso</h1>";
      echo "<a href='index.html'><input type='button' value='Voltar'></a></center>";
    } else {
      echo "<h3>OCORREU UM ERRO: </h3>: " . $sql . "<br>" . $conn->error;
    }
?>
