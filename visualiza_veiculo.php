<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização de Veículos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 3px solid #333;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        h1 {
            text-align: center;
        }
        .button {
            text-align: center;
            margin-top: 10px;
        }
        .button a {
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }
        .button a:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Veículos Cadastrados</h1>

        <table>
            <thead>
                <tr>
                <td>NOME</td>
                <td>RE</td>
                <td>PLACA</td>
                <td>DATAHORA</td>
                <td>TIPO</td>
                <td>FINALIDADE</td>
                <td>ESPECIFICACAO</td>
                <td>DESCRICAO</td>
                <td>AÇÃO</td> <!-- Coluna para o botão de exclusão -->
                                   
                </tr>
            </thead>
            <tbody>
                <?php
                    require("conecta.php");

                    // Consulta SQL com id_veiculo incluso
                    $dados_select = mysqli_query($conn, "SELECT id_veiculo, NOME, RE, PLACA, DATAHORA, TIPO, FINALIDADE, ESPECIFICACAO, DESCRICAO FROM VEICULO");

                    while ($dado = mysqli_fetch_array($dados_select)) {
                        echo '<tr>';
                        echo '<td>'.$dado['NOME'].'</td>';
                        echo '<td>'.$dado['RE'].'</td>';
                        echo '<td>'.$dado['PLACA'].'</td>';
                        echo '<td>'.$dado['DATAHORA'].'</td>';
                        echo '<td>'.$dado['TIPO'].'</td>';
                        echo '<td>'.$dado['FINALIDADE'].'</td>';
                        echo '<td>'.$dado['ESPECIFICACAO'].'</td>';
                        echo '<td>'.$dado['DESCRICAO'].'</td>';
                        
                        // Verifica se 'id_veiculo' está definido no array $dado antes de criar o link de exclusão
                        if (isset($dado['id_veiculo'])) {
                            echo '<td><a href="excluir_veiculo.php?id_veiculo='.$dado['id_veiculo'].'">Excluir</a></td>';
                        } else {
                            echo '<td>Chave id_veiculo não está definida</td>';
                        }

                         // Verifica se 'id_veiculo' está definido no array $dado antes de criar o link de edição
                        if (isset($dado['id_veiculo'])) {
                            echo '<td><a href="editar_veiculo.php?id_veiculo='.$dado['id_veiculo'].'">Editar</a></td>';
                        } else {
                             echo '<td>Chave id_veiculo não está definida</td>';
                        }
                        
                      
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
        <div class="button">
            <a href="index.html">Voltar</a>
        </div>
    </div>
</body>

</html>
