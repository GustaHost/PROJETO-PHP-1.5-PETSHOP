<?php
// inicializando variáveis de erro e sucesso
$erro_email = '';
$erro_nome = '';
$erro_idade = '';
$erro_telefone = '';
$sucesso = '';

// variáveis para armazenar os valores inseridos
$nome = '';
$email = '';
$idade = '';
$telefone = '';

//validação
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'validacaoContato.php';  
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
            <h1 class="ficar_no_meio">Fique Fidelizado com o Pet Shop!</h1>

            <!-- formulario -->
            <div id="formulario" style="text-align: center;">
                <form action="contato.php" method="POST">
                    <label>Seu Nome: </label>
                    <input type="text" id="nome" name="nome" value="<?php echo isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : ''; ?>" required placeholder="Digite seu nome">
                    <br><br>

                    <label>Seu E-mail: </label>
                    <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required placeholder="Digite seu e-mail">
                    <br><br>

                    <label>Sua Idade: </label>
                    <input type="text" id="idade" name="idade" value="<?php echo isset($_POST['idade']) ? htmlspecialchars($_POST['idade']) : ''; ?>" required placeholder="Digite sua idade">
                    <br><br>

                    <label>Telefone:</label>
                    <input name="telefone" placeholder="(XX) 99999-9999" onkeyup="mascaraTelefone(this)" value="<?php if(isset($_POST['telefone'])){echo $_POST['telefone'];} ?>"><br><br>

                    <button type="submit">Enviar</button>
                </form>
            </div>

            <!-- mostra mensagens de erro ou sucesso -->
            <?php 
                if (!empty($erro)): 
            ?>

            <div style="color: red; text-align: center;">
                <strong>Erro:</strong>
                 <?php 
                    echo 
                 $erro; ?>
            </div>

            <?php elseif (!empty($sucesso)): ?>
                <div style="color: green; text-align: center;">
                    <strong>Sucesso:</strong> 
                    
                    <?php 
                        echo $sucesso; 
                    ?>
                </div>
            <?php 
                endif; 
            ?>

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