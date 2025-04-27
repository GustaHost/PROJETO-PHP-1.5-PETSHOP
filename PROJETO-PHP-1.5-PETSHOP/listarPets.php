<?php
// Verifica se há pets cadastrados na sessão
if (isset($_SESSION['pets']) && !empty($_SESSION['pets'])) {
    // Mostrar pets adicionados
    foreach ($_SESSION['pets'] as $index => $pet) {
        echo "<div style='border:1px solid #ccc; padding:10px; margin-bottom:10px'>";
        echo "<strong>Nome:</strong> {$pet['nome']}<br>";
        echo "<strong>Idade:</strong> {$pet['idade']} anos<br>";
        echo "<strong>Raça:</strong> {$pet['raca']}<br>";
        echo "<strong>Porte:</strong> {$pet['porte']}<br>";
        echo "<strong>Observações:</strong> {$pet['observacoes']}<br>";

        // Botão para excluir o pet
        echo "<form method='POST' action='Pets.php'>";
        echo "<input type='hidden' name='excluir' value='$index'>"; // Envia o índice a ser excluído
        echo "<button type='submit'>Excluir</button>";
        echo "</form>";
        echo "</div>";
    }

    echo "<div style='text-align: center; padding: 20px;'>";
    echo "<a href='adicionarPet.php'><button style='padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px;'>Adicionar Outro Pet</button></a>";
    echo "</div>";
} else {
    // se n tiver pets registrados vai mostrar uma msg e o botao pra adicionar um pet
    echo "<div style='text-align: center; padding: 20px; border: 2px dashed #ccc; margin: 20px;'>";
    echo "<p><strong>Ops!</strong> Você ainda não cadastrou nenhum pet.</p>";
    echo "<p>Adicione um pet para começar!</p>";
    echo "<a href='adicionarPet.php'><button style='padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px;'>Adicionar Pet</button></a>";
    echo "</div>";
}
?>