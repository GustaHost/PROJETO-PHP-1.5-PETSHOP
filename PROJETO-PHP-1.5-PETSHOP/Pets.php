<?php
session_start();

// Verifica se o índice de exclusão foi enviado
if (isset($_POST['excluir'])) {
    $index = $_POST['excluir'];

    // Se o pet existir na lista, exclui ele da sessão
    if (isset($_SESSION['pets'][$index])) {
        unset($_SESSION['pets'][$index]);
        $_SESSION['pets'] = array_values($_SESSION['pets']);
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
            <h1 class="ficar_no_meio">
                Pets cadastrados:
            </h1>

            <?php
                include 'listarPets.php';
            ?>
            
        </main>

        <p id="frase">
            Muito obrigado por visitar o site
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
                <p>Visite nossos canais no Instagram e no Facebook</p>
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