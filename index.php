<?php
    require "conexao_bd.php";
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
                            <td>2023</td>
                            <td>R$110</td>
                        </tr>
                        <tr>
                            <td>2023</td>
                            <td>R$110</td>
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
            <form>
                <div class="form-row">
                    <div>
                        <label>Nome</label>
                        <input>
                    </div>
                    <div>
                        <label>Email</label>
                        <input>
                    </div>
                </div>
                <div class="form-row">
                    <div>
                        <label>Cpf</label>
                        <input>
                    </div>
                    <div>
                        <label>Data de Filiação</label>
                        <input type="date">
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
                <div class="form-row">
                    <div>
                        <label>Ano</label>
                        <input placeholder="Ex: 2024">
                    </div>
                    <div>
                        <label>Valor</label>
                        <input placeholder="Ex: 200">
                    </div>
                </div>
                <button>Cadastrar</button>
            </form>
        </div>
    </div>

    <script src="/static/js/script.js"></script>
</body>
</html>