<?php
// Importa a classe Aluno
require_once 'db.php';
$alunosCadastrado = false;

// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];


    // Criar uma nova instância da classe Alunos
    $alunos = new alunos();

    // Adicionar o novo alunos no banco de dados
    $alunos->adicionarAlunos($nome, $email);

    // Fechar a conexão
    $alunos->fecharConexao();

    $alunosCadastrado = true;

    // Redirecionar para a página de listagem ou exibir uma mensagem de sucesso
    echo "alunos adicionado com sucesso!";
    // Ou redirecionar para outra página
    // header("Location: listar_alunos.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Alunos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
    if($alunosCadastrado){
        echo '<div class="container mt-5">
            <div class="alert alert-success" role="alert">
                Aluno adicionado com sucesso!
            </div>
            <a href="adicionar_alunos.php" class="btn btn-primary">Cadastrar Outro Aluno</a>
            <a href="listar_alunos.php" class="btn btn-secondary">Ver Alunos</a>
        </div>';
    }
    ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Cadastro de Alunos</h1>
        
        <!-- Formulário de Cadastro de Alunos -->
        <form action="adicionar_alunos.php" method="POST" class="border p-4 bg-light rounded">
            
            <!-- Nome do Aluno -->
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Aluno:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do Aluno" required>
            </div>
            
            <!-- Email -->
            <div class="mb-3">
                <label for="descricao" class="form-label">Email:</label>
                <textarea class="form-control" id="email" name="email" rows="3" placeholder="Digite o email do aluno" required></textarea>
            </div>
        
            
            <!-- Botão para Adicionar Aluno -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Adicionar Aluno</button>
            </div>
            
        </form>
    </div>

    <!-- Bootstrap JS (Opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
