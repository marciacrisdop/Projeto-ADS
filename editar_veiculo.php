<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Veículo</title>
</head>
<body>
    <h1>Editar Veículo</h1>

    <?php
    require("conecta.php");

    // Verifica se o parâmetro 'id_veiculo' foi enviado via GET
    if (isset($_GET['id_veiculo'])) {
        $id_veiculo = $_GET['id_veiculo'];

        // Consulta SQL para obter os dados do veículo com o ID específico
        $query = "SELECT * FROM VEICULO WHERE id_veiculo = $id_veiculo";
        $result = mysqli_query($conn, $query);

        // Verifica se encontrou algum registro
        if (mysqli_num_rows($result) > 0) {
            $veiculo = mysqli_fetch_assoc($result);
        } else {
            echo "Veículo não encontrado.";
            exit;
        }
    } else {
        echo "ID do veículo não foi fornecido.";
        exit;
    }
    ?>

    <form action="atualizar_veiculo.php" method="post">
        <input type="hidden" name="id_veiculo" value="<?php echo $veiculo['id_veiculo']; ?>">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $veiculo['NOME']; ?>"><br><br>
        
        <!-- Adicione outros campos para os demais dados do veículo -->
        <label for="re">RE:</label>
        <input type="text" id="re" name="re" value="<?php echo $veiculo['RE']; ?>"><br><br>

        <label for="placa">Placa:</label>
        <input type="text" id="placa" name="placa" value="<?php echo $veiculo['PLACA']; ?>"><br><br>

        <label for="datahora">Data e Hora:</label>
        <input type="datetime-local" id="datahora" name="datahora" value="<?php echo date('Y-m-d\TH:i', strtotime($veiculo['DATAHORA'])); ?>"><br><br>

        <label for="tipo">Tipo:</label>
        <input type="text" id="tipo" name="tipo" value="<?php echo $veiculo['TIPO']; ?>"><br><br>

        <label for="finalidade">Finalidade:</label>
        <input type="text" id="finalidade" name="finalidade" value="<?php echo $veiculo['FINALIDADE']; ?>"><br><br>

        <label for="especificacao">Especificação:</label>
        <input type="text" id="especificacao" name="especificacao" value="<?php echo $veiculo['ESPECIFICACAO']; ?>"><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao" rows="4" cols="50"><?php echo $veiculo['DESCRICAO']; ?></textarea><br><br>

        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
