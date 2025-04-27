function mascaraTelefone(valor) {
    var valorAlterado = valor.value;
    
    // Remove todos os não-dígitos
    valorAlterado = valorAlterado.replace(/\D/g, ""); 
    
    // bota a máscara no número
    valorAlterado = valorAlterado.replace(/^(\d{2})(\d)/g, "($1) $2");  // Coloca os parênteses no DDD
    valorAlterado = valorAlterado.replace(/(\d{5})(\d)/, "$1-$2"); // Adiciona o hífen após os 5 primeiros dígitos
    
    // Atualiza o campo de entrada com o valor certo
    valor.value = valorAlterado;
}

function validarIdade(valor) {
    // Remove todos os caracteres não numéricos
    var valor = valor.value.replace(/\D/g, '');

    // Se o valor for maior que 100 ta errado
    if (valor.length > 3) {
        valor = valor.substring(0, 3); // Limita a idade a 3 dígitos
    }

    // Atualiza o valor no campo
    input.value = valor;
}