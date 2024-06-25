<?php
require("conecta.php");

// Verifica se todos os campos do formulário foram enviados via POST
if (isset($_POST['id_veiculo'], $_POST['nome'], $_POST['re'], $_POST['placa'], $_POST['datahora'], $_POST['tipo'], $_POST['finalidade'], $_POST['especificacao'], $_POST['descricao'])) {
    // Sanitize e prepara os dados para a atualização
    $id_veiculo = $_POST['id_veiculo'];
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $re = mysqli_real_escape_string($conn, $_POST['re']);
    $placa = mysqli_real_escape_string($conn, $_POST['placa']);
    $datahora = date('Y-m-d H:i:s', strtotime($_POST['datahora'])); // Formata a data e hora para o formato do banco de dados
    $tipo = mysqli_real_escape_string($conn, $_POST['tipo']);
    $finalidade = mysqli_real_escape_string($conn, $_POST['finalidade']);
    $especificacao = mysqli_real_escape_string($conn, $_POST['especificacao']);
    $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);

    // Query SQL para atualizar o registro
    $query = "UPDATE VEICULO SET NOME = '$nome', RE = '$re', PLACA = '$placa', DATAHORA = '$datahora', TIPO = '$tipo', FINALIDADE = '$finalidade', ESPECIFICACAO = '$especificacao', DESCRICAO = '$descricao' WHERE id_veiculo = $id_veiculo";

    // Executa a query de atualização
    if (mysqli_query($conn, $query)) {
        echo "Registro atualizado com sucesso.";
        header("Location: visualiza_veiculo.php"); // Redireciona para a página de visualização após a atualização
        exit;
    } else {
        echo "Erro ao atualizar o registro: " . mysqli_error($conn);
    }

    // Fecha a conexão
    mysqli_close($conn);
} else {
    echo "Por favor, preencha todos os campos do formulário.";
}
?>
