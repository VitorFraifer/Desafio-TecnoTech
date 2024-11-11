<?php
    require "conexao_bd.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $formulario = $_POST['formulario'] ?? '';
    
        // Condicional para verificar qual formulário foi submetido
        if ($formulario === 'cadastro-associado') {
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
            $dataFiliacao = filter_input(INPUT_POST, 'dataFiliacao', FILTER_SANITIZE_SPECIAL_CHARS);
            
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
    
        // Mesmo processo para o cadastro de anuidade
        elseif ($formulario === 'cadastro-anuidade') {
            $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_NUMBER_INT);
            $valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_NUMBER_INT);
            
            try {
                $sql = 'INSERT INTO "TecnoTech".anuidades (ano, valor) VALUES (:ano, :valor)';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':ano', $ano);
                $stmt->bindParam(':valor', $valor);
                $stmt->execute();
                
            } catch (PDOException $e) {
                echo "Erro ao enviar feedback: " . $e->getMessage();
            }
        }

        // Exclusão de associado
        elseif ($formulario === 'delete-associado') {
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
            
            try {
                $sql = 'DELETE FROM "TecnoTech".associados WHERE id = :id';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                echo "Associado excluído com sucesso!";
            } catch (PDOException $e) {
                echo "Erro ao excluir associado: " . $e->getMessage();
            }
        } 

        elseif ($formulario === 'delete-anuidade') {
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
            
            try {
                $sql = 'DELETE FROM "TecnoTech".anuidades WHERE id = :id';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "Erro ao excluir anuidade: " . $e->getMessage();
            }
        }
        elseif ($formulario === 'editar-anuidade') {
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
            $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_NUMBER_INT);
            $valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_NUMBER_INT);
            
            try {
                $sql = 'UPDATE "TecnoTech".anuidades SET ano = :ano, valor = :valor WHERE id = :id';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':ano', $ano);
                $stmt->bindParam(':valor', $valor);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "Erro ao atualizar anuidade: " . $e->getMessage();
            }
        }
        elseif ($formulario === 'editar-associado') {
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
            $dataFiliacao = filter_input(INPUT_POST, 'dataFiliacao', FILTER_SANITIZE_SPECIAL_CHARS);
        
            try {
                $sql = 'UPDATE "TecnoTech".associados SET nome = :nome, email = :email, cpf = :cpf, "data-filiacao" = :dataFiliacao WHERE id = :id';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':cpf', $cpf);
                $stmt->bindParam(':dataFiliacao', $dataFiliacao);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "Erro ao atualizar associado: " . $e->getMessage();
            }
        }
        
    }

    // Armazenando todos os associados em um array para exibi-los no HTML
    $sql = 'SELECT * FROM "TecnoTech".associados';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $associadosArray = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //Armazenando todas as anuidades em um array para exibi-las no HMTL
    $sql = 'SELECT * FROM "TecnoTech".anuidades';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $anuidadesArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
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
        <h1 class="cabecalho">DEVS RN GESTÃO</h1>
        <section class="associados-section">
            <div class="titulo-section">
                <h1>Associados</h1>
                <img src="/static/img/plus-icon.svg" class="btn-adicionar-associados">
            </div>
            <ul class="lista-associados">
                <?php foreach ($associadosArray as $associado): ?>
                    <li class="associado">
                        <h2><?php echo htmlspecialchars($associado['nome']); ?></h2>
                        <img src="/static/img/edit-icon.svg" onclick="editAssociado(<?php echo $associado['id']; ?>, '<?php echo $associado['nome']; ?>', '<?php echo $associado['email']; ?>', '<?php echo $associado['cpf']; ?>', '<?php echo $associado['data-filiacao']; ?>')">
                        <img src="/static/img/search-icon.svg">
                        <img src="/static/img/delete-icon.svg" onclick="deleteAssociado(<?php echo $associado['id']; ?>)">
                    </li> 
                <?php endforeach; ?>
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
                    <?php foreach ($anuidadesArray as $anuidade): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($anuidade['ano']); ?></td>
                            <td><?php echo "R$" . htmlspecialchars($anuidade['valor']); ?> <img src="/static/img/edit-icon.svg" onclick="editAnuidade(<?php echo $anuidade['id']; ?>, '<?php echo $anuidade['ano']; ?>', '<?php echo $anuidade['valor']; ?>')"> <img src="/static/img/delete-icon.svg" onclick="deleteAnuidade(<?php echo $anuidade['id']; ?>)"></td>
                        </tr>
                    <?php endforeach; ?>
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
    
    <div class="modal-editar-associados">
        <div class="modal-container">
            <div class="icone-fechar-modal-container"><img src="/static/img/close-icon.svg" class="btn-fechar-modal" id="fechar-modal-editar-associados"></div>
            <h3>Editar Associado</h3>
            <form action="index.php" method="POST">
                <input type="hidden" name="formulario" value="editar-associado">
                <input type="hidden" name="id" value="">
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
                <button>Editar</button>
            </form>
        </div>
    </div>
    
    <div class="modal-cadastro-anuidade">
        <div class="modal-container">
            <div class="icone-fechar-modal-container"><img src="/static/img/close-icon.svg" class="btn-fechar-modal" id="fechar-modal-anuidade"></div>
            <h3>Cadastro de Anuidade</h3>
            <form action="index.php" method="POST">
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
    
    <div class="modal-edicao-anuidade">
        <div class="modal-container">
            <div class="icone-fechar-modal-container"><img src="/static/img/close-icon.svg" class="btn-fechar-modal icone-fechar-modal-anuidade"></div>
            <h3>Editar Anuidade</h3>
            <form action="index.php" method="POST">
                <input type="hidden" name="formulario" value="editar-anuidade">
                <input type="hidden" name="id" value="">
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
                <button>Editar</button>
            </form>
        </div>
    </div>

    <script src="/static/js/script.js"></script>
</body>
</html>