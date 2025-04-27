<?php
// Validação dos campos
if (empty($nome_pet) || empty($raca) || empty($porte)) {
    $erro_nome_pet = "Nome do pet, raça e porte são obrigatórios.";
}

if (!preg_match("/^[a-zA-Z\s]+$/", $nome_pet)) { 
    $erro_nome_pet = "O nome do pet não pode conter números ou caracteres especiais.";
}

if (empty($idade)) {
    $erro_idade = "Idade é obrigatória.";
} elseif (!is_numeric($idade) || $idade < 0 || $idade > 100) {
    $erro_idade = "Idade inválida. Deve ser um número entre 0 e 100.";
}