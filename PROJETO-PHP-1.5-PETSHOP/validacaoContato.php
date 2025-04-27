<?php
// Recebe os dados do formulário
$nome = htmlspecialchars($_POST['nome']);
$email = htmlspecialchars($_POST['email']);
$idade = $_POST['idade'];
$telefone = $_POST['telefone'];

$erro = '';
$sucesso = '';

// Validação dos dados
if (empty($nome) || empty($email) || empty($idade) || empty($telefone)) {
    $erro = "Todos os campos são obrigatórios!";
} elseif (!preg_match("/^[a-zA-Z\s]+$/", $nome)) {  // Verifica se o nome contém apenas letras e espaços
    $erro = "O nome não pode conter números ou caracteres especiais!";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erro = "O e-mail informado não é válido!";
} elseif (!is_numeric($idade)) {
    $erro = "A idade deve ser um número válido!";
} elseif (!preg_match('/^\d{10,11}$/', preg_replace('/\D/', '', $telefone))) {  // Verifica se o número tem 10 ou 11 dígitos (removendo qualquer caractere não numérico)
    $erro = "O número de telefone deve ter 10 ou 11 dígitos!";
}

// Se não tiver erro mostra essa mensagem de sucesso
if (empty($erro)) {
    $sucesso = "Obrigado, $nome! Sua fidelidade foi registrada com sucesso. Em breve entraremos em contato.";
}
?>