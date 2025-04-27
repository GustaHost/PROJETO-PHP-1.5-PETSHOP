<?php
session_start();

$erro_nome_pet = '';
$erro_idade = '';
$erro_raca = '';
$erro_porte = '';
$erro_observacoes = '';


// Recebe os dados do formulário
$nome_pet = isset($_POST['nome_pet']) ? htmlspecialchars($_POST['nome_pet']) : '';
$idade = isset($_POST['idade']) ? $_POST['idade'] : '';
$raca = isset($_POST['raca']) ? htmlspecialchars($_POST['raca']) : '';
$porte = isset($_POST['porte']) ? $_POST['porte'] : '';
$observacoes = isset($_POST['observacoes']) ? htmlspecialchars($_POST['observacoes']) : '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'validacaoADDPET.php';  // pega a validação dos dados la da outra pagina

    if (empty($erro_nome_pet) && empty($erro_idade) && empty($erro_raca) && empty($erro_porte)) {
        
        if (!isset($_SESSION['pets'])) {
            $_SESSION['pets'] = [];  
        }

        
        $pet = [
            'nome' => $nome_pet,
            'idade' => $idade,
            'raca' => $raca,
            'porte' => $porte,
            'observacoes' => $observacoes
        ];

        
        $_SESSION['pets'][] = $pet;


        // manda para a página Pets.php
        header('Location: Pets.php');
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PET SHOP - Cachorrinhos</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/logo.jpg" type="image/x-icon">
</head>
<body>
    <div class="tudo">    
        <header>
            <nav id="menu">
                <div class="blocos_menus">
                    <a href="index.html" ><img src="img/logo.jpg" alt="icon" style="height: 60px; width: 60px; border-radius: 5px;"></a>
                </div>

                <div class="blocos_menus">
                    <a href="Pets.php" >Pets Registrados</a>
                </div> 
            
                <div class="blocos_menus">
                    <a href="adicionarPet.php" >Adicionar PET</a>
                </div>
                
                <div class="blocos_menus">
                    <a href="contato.php" >Contato</a>
                </div>

            </nav>
        </header>

        <main class="corpos">
                <h1 class="ficar_no_meio">Cadastro de Novo Pet</h1>

                <!-- mensagem de erro  -->
                <?php if (!empty($erro_nome_pet) || !empty($erro_idade) || !empty($erro_raca) || !empty($erro_porte)): ?>
                    <div style="color: red; text-align: center;">
                        <p><strong>Erro(s):</strong></p>
                        <?php
                            if (!empty($erro_nome_pet)) echo "<p>$erro_nome_pet</p>";
                            if (!empty($erro_idade)) echo "<p>$erro_idade</p>";
                            if (!empty($erro_raca)) echo "<p>$erro_raca</p>";
                            if (!empty($erro_porte)) echo "<p>$erro_porte</p>";
                        ?>
                    </div>
                <?php endif; ?>

                <!-- Formulário de Cadastro de Pet -->
                <div id="formulario">
                    <form action="adicionarPet.php" method="POST">
                        <label>Nome do Pet: </label>
                        <input type="text" name="nome_pet" value="<?php echo isset($_POST['nome_pet']) ? $_POST['nome_pet'] : ''; ?>" required>
                        <br><br>

                        <label>Idade: </label>
                        <input type="text" name="idade" value="<?php echo isset($_POST['idade']) ? $_POST['idade'] : ''; ?>" required onkeyup="validarIdade(this)">
                        <br><br>

                        <label>Raça: </label>
                        <input type="text" name="raca" value="<?php echo isset($_POST['raca']) ? $_POST['raca'] : ''; ?>" required>
                        <br><br>

                        <label>Porte: </label>
                        <select name="porte" required>
                            <option value="">Selecione o porte</option>
                            <option value="pequeno" <?php if(isset($_POST['porte']) && $_POST['porte'] == 'pequeno') echo 'selected'; ?>>Pequeno</option>
                            <option value="médio" <?php if(isset($_POST['porte']) && $_POST['porte'] == 'médio') echo 'selected'; ?>>Médio</option>
                            <option value="grande" <?php if(isset($_POST['porte']) && $_POST['porte'] == 'grande') echo 'selected'; ?>>Grande</option>
                        </select>
                        
                        <br><br>

                        <label>Observações: </label>
                        
                        <br>
                        
                        <textarea name="observacoes"><?php echo isset($_POST['observacoes']) ? $_POST['observacoes'] : ''; ?></textarea><br><br>

                        <button type="submit">Adicionar Pet</button>
                    </form>
                </div>
            </main>
        <p id="frase">
            muito obrigado por visitar o site
        </p>
        <footer id="rodape">
            
            
            <div class="blocos_rodape">
                <div class="bloquinhos">
                    <p><strong>Atendimento:</strong> (11) 99999-9999 | contato@petshop.com</p>
                </div>
                <div class="bloquinhos">
                    <p><strong>Endereço:</strong> Rua dos Bichinhos, 123 - São Paulo, SP</p>
                </div>
                <div class="bloquinhos">
                    <p><strong>Horário:</strong> Seg a Sáb - 9h às 18h</p>
                </div>
                
                
                
            </div>

            <div class="blocos_rodape">
                <p>
                    Visite nossos canal no instagram e no facebook
                </p>
                <a href="https://instagram.com/petshop" target="_blank">
                    <img src="img/instagram.png" alt="logo instagram" style="height: 50px; width: 50px;">
                </a>
                <a href="https://facebook.com/petshop" target="_blank">
                    <img src="img/facebook.png" alt="logo facebook" style="height: 50px; width: 50px;">
                </a>
            </div>
        </footer>


        <script src="js/javaScript.js"></script>
    </div>
</body>
</html>