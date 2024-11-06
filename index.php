<?php
    require "conexao_bd.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verifique qual formulário foi submetido
        $formulario = $_POST['formulario'] ?? '';
    
        // Processa o formulário de cadastro de usuário
        if ($formulario === 'cadastro-associado') {
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
            $dataFiliacao = filter_input(INPUT_POST, 'dataFiliacao', FILTER_SANITIZE_SPECIAL_CHARS);
            
            // Insira os dados no banco
            try {
                $sql = 'INSERT INTO "TecnoTech".associados (nome, email, cpf, "data-filiacao") VALUES (:nome, :email, :cpf, :dataFiliacao)';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':cpf', $cpf);
                $stmt->bindParam(':dataFiliacao', $dataFiliacao);
                $stmt->execute();
                
            } catch (PDOException $e) {
                echo "Erro ao cadastrar: " . $e->getMessage();
            }
        }
    
        // Processa o formulário de feedback
        elseif ($formulario === 'cadastro_anuidade') {
            $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);
            
            // Insira a mensagem no banco
            try {
                $sql = "INSERT INTO feedback (mensagem) VALUES (:mensagem)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':mensagem', $mensagem);
                $stmt->execute();
                
                echo "Feedback enviado com sucesso!";
            } catch (PDOException $e) {
                echo "Erro ao enviar feedback: " . $e->getMessage();
            }
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devs RN</title>
    <link rel="stylesheet" href="/static/css/reset.css">
    <link rel="stylesheet" href="/static/css/index.css">
</head>
<body>
    <main>
        <section class="associados-section">
            <div class="titulo-section">
                <h1>Associados</h1>
                <img src="/static/img/plus-icon.svg" class="btn-adicionar-associados">
            </div>
            <ul class="lista-associados">
                <li class="associado">
                    <h2>Fernando Henrique Cardoso</h2>
                    <img src="/static/img/edit-icon.svg">
                    <img src="/static/img/search-icon.svg">
                </li>
                <li class="associado">
                    <h2>Fernando Henrique Cardoso</h2>
                    <img src="/static/img/edit-icon.svg">
                    <img src="/static/img/search-icon.svg">
                </li>
                <li class="associado">
                    <h2>Fernando Henrique Cardoso</h2>
                    <img src="/static/img/edit-icon.svg">
                    <img src="/static/img/search-icon.svg">
                </li>
                <li class="associado">
                    <h2>Fernando Henrique Cardoso</h2>
                    <img src="/static/img/edit-icon.svg">
                    <img src="/static/img/search-icon.svg">
                </li>
            </ul>
        </section>
        <section class="anuidade-section">
            <div class="titulo-section">
                <h1>Anuidades</h1>
                <img src="/static/img/plus-icon.svg" class="btn-adicionar-anuidade">
            </div>
            <div class="table-container">
                <table class="tabela-anuidade">
                    <thead>
                        <tr>
                            <td>Ano</td>
                            <td>Valor</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2022</td>
                            <td>R$100 <img src="/static/img/edit-icon.svg"></td>
                        </tr>
                        <tr>
                            <td>2023</td>
                            <td>R$110 <img src="/static/img/edit-icon.svg"></td>
                        </tr>
                        <tr>
                            <td>2024</td>
                            <td>R$115 <img src="/static/img/edit-icon.svg"></td>
                        </tr>
                        <tr>
                            <td>2025</td>
                            <td>R$125 <img src="/static/img/edit-icon.svg"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <div class="modal-cadastro-associados">
        <div class="modal-container">
            <div class="icone-fechar-modal-container"><img src="/static/img/close-icon.svg" class="btn-fechar-modal"></div>
            <h3>Cadastro de Associado</h3>
            <form action="index.php" method="POST">
                <input type="hidden" name="formulario" value="cadastro-associado">
                <div class="form-row">
                    <div>
                        <label>Nome</label>
                        <input type="text" name="nome">
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email">
                    </div>
                </div>
                <div class="form-row">
                    <div>
                        <label>CPF</label>
                        <input name="cpf">
                    </div>
                    <div>
                        <label>Data de Filiação</label>
                        <input type="date" name="dataFiliacao">
                    </div>
                </div>
                <button>Cadastrar</button>
            </form>
        </div>
    </div>
    
    <div class="modal-cadastro-anuidade">
        <div class="modal-container">
            <div class="icone-fechar-modal-container"><img src="/static/img/close-icon.svg" class="btn-fechar-modal" id="fechar-modal-anuidade"></div>
            <h3>Cadastro de Anuidade</h3>
            <form>
                <input type="hidden" name="formulario" value="cadastro-anuidade">
                <div class="form-row">
                    <div>
                        <label>Ano</label>
                        <input placeholder="Ex: 2024" name="ano">
                    </div>
                    <div>
                        <label>Valor</label>
                        <input placeholder="Ex: 200" name="valor">
                    </div>
                </div>
                <button>Cadastrar</button>
            </form>
        </div>
    </div>

    <script src="/static/js/script.js"></script>
</body>
</html>