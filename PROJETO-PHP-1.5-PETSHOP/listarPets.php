<?php
// Verifica se o índice de exclusão foi enviado
if (isset($_POST['excluir'])) {
    $index = $_POST['excluir'];

    // Se o pet existir na lista, exclui ele da sessão
    if (isset($_SESSION['pets'][$index])) {
        unset($_SESSION['pets'][$index]);
        $_SESSION['pets'] = array_values($_SESSION['pets']);
    }
}


if (isset($_SESSION['pets']) && !empty($_SESSION['pets'])) {
    // mostrar pets adicionados
    foreach ($_SESSION['pets'] as $index => $pet) {
        echo "<div style='border:1px solid #ccc; padding:10px; margin-bottom:10px'>";
        echo "<strong>Nome:</strong> {$pet['nome']}<br>";
        echo "<strong>Idade:</strong> {$pet['idade']} anos<br>";
        echo "<strong>Raça:</strong> {$pet['raca']}<br>";
        echo "<strong>Porte:</strong> {$pet['porte']}<br>";
        echo "<strong>Observações:</strong> {$pet['observacoes']}<br>";

        // botao de excluir o pet
        echo "<form method='POST' action='Pets.php'>";
        echo "<input type='hidden' name='excluir' value='$index'>"; // manda o indice a ser excluido
        echo "<button type='submit'>Excluir</button>";
        echo "</form>";
        echo "</div>";
    }

    echo "<div style='text-align: center; padding: 20px;'>";
    echo "<a href='adicionarPet.php'><button style='padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px;'>Adicionar Outro Pet</button></a>";
    echo "</div>";
} else {
    // msg se não haja pets cadastrados
    echo "<div style='text-align: center; padding: 20px; border: 2px dashed #ccc; margin: 20px;'>";
    echo "<p><strong>Ops!</strong> Você ainda não cadastrou nenhum pet.</p>";
    echo "<p>Adicione um pet para começar!</p>";
    echo "<a href='adicionarPet.php'><button style='padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px;'>Adicionar Pet</button></a>";
    echo "</div>";
}
?>