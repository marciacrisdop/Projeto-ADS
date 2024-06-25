<?php
// Verifica se o parâmetro 'id_veiculo' foi enviado via GET
if (isset($_GET['id_veiculo'])) {
    $id_veiculo = $_GET['id_veiculo'];

    // Conexão com o banco de dados
    require("conecta.php");

    // Prepara a consulta para excluir o registro
    $sql = "DELETE FROM VEICULO WHERE id_veiculo = $id_veiculo";

    // Executa a consulta
    if (mysqli_query($conn, $sql)) {
        echo "Registro excluído com sucesso.";
    } else {
        echo "Erro ao tentar excluir o registro: " . mysqli_error($conn);
    }

    // Fecha a conexão
    mysqli_close($conn);
} else {
    echo "ID do veículo não foi fornecido para exclusão.";
}
?>