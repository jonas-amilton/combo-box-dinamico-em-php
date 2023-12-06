<?php
// Inclui o arquivo de conexão com o banco de dados
include('conexao.php');

// Consulta para obter todos os estados ordenados por nome
$sql_code_states = "SELECT * FROM estados ORDER BY nome ASC";
// Executa a consulta
$sql_query_states = $conn->query($sql_code_states) or die($conn->error);
?>

<!-- Formulário para selecionar estado e cidade -->
<form method="GET" action="">
    <!-- Select para escolher um estado -->
    <select <?php if(isset($_GET['estado'])) echo "disabled"; ?> required name="estado">
        <option value="">Selecione um estado</option>
        <?php
        // Enquanto houver estados na consulta, cria opções no select
        while($estado = $sql_query_states->fetch_assoc()) { ?>
            <option <?php if(isset($_GET['estado']) && $_GET['estado'] == $estado['id']) echo "selected"; ?> value="<?php echo $estado['id']; ?>"><?php echo $estado['nome']; ?></option>
        <?php } ?>
    </select>

    <?php if(isset($_GET['estado'])) { ?>
        <!-- Select para escolher uma cidade -->
        <select required name="cidade">
            <option value="">Selecione uma cidade</option>
            <?php 
            // Obtém o estado selecionado
            $selected_state = $conn->real_escape_string($_GET['estado']);
            // Consulta para obter cidades do estado selecionado
            $sql_code_cities = "SELECT * FROM cidades WHERE id_estado = '$selected_state' ORDER BY nome";
            // Executa a consulta
            $sql_query_cities = $conn->query($sql_code_cities) or die($conn->error);

            // Enquanto houver cidades na consulta, cria opções no select
            while($cidade = $sql_query_cities->fetch_assoc()) { ?>
                <option value="<?php echo $cidade['id']; ?>"><?php echo $cidade['nome']; ?></option>
            <?php } ?>
        </select>
    <?php } ?>

    <!-- Botão de envio do formulário -->
    <button type="submit">Avançar</button>
</form>
