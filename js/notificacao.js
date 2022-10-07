// Funcao para gerar senha conforme o tipo da senha enviado no paramento

async function chamarSenha(tipoSenha) {

    // Chamar o arquivo PHP para gerar a senha
    const dados = await fetch('notificacao.php');

    // Ler os dados retornado pelo PHP
    const resposta = await dados.json();
}