const abrirModalCadastroAssociados = document.querySelector(".btn-adicionar-associados");
const btnFecharModalCadastroAssociados = document.querySelector(".btn-fechar-modal");
const modalCadastroAssociados = document.querySelector(".modal-cadastro-associados");
const btnAbrirModalCadastroAnuidade = document.querySelector(".btn-adicionar-anuidade")
const modalCadastroAnuidade = document.querySelector(".modal-cadastro-anuidade");
const btnFecharModalCadastroAnuidade = document.querySelector("#fechar-modal-anuidade");
const modalEdicaoAnuidade = document.querySelector(".modal-edicao-anuidade");
const modalEdicaoAssociado = document.querySelector(".modal-editar-associados");
const btnFecharModalEditarAssociado = document.querySelector("#fechar-modal-editar-associados");
const btnFecharModalEditarAnuidade = document.querySelector(".icone-fechar-modal-anuidade");

abrirModalCadastroAssociados.addEventListener("click", () => {
    modalCadastroAssociados.style.display = "flex";
})

btnFecharModalCadastroAssociados.addEventListener("click", () => {
    modalCadastroAssociados.style.display = "none"
})

btnAbrirModalCadastroAnuidade.addEventListener("click", () => {
    modalCadastroAnuidade.style.display = "flex";
})

btnFecharModalCadastroAnuidade.addEventListener("click", () => {
    modalCadastroAnuidade.style.display = "none";
})

btnFecharModalEditarAssociado.addEventListener("click", () => {
    modalEdicaoAssociado.style.display = "none";
})

btnFecharModalEditarAnuidade.addEventListener("click", () => {
    modalEdicaoAnuidade.style.display = "none";
    console.log("fechando modal editar anuidade");
})

function deleteAssociado(id) {
    if (confirm("Tem certeza de que deseja excluir este associado?")) {
        fetch("index.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `formulario=delete-associado&id=${id}`
        })
        .then(response => response.text())
        .then(data => {
            alert("Associado excluído com sucesso!");
            location.reload();
        })
        .catch(error => console.error("Erro ao excluir associado:", error));
    }
}

function deleteAnuidade(id) {
    if (confirm("Tem certeza de que deseja excluir esta anuidade?")) {
        fetch("index.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `formulario=delete-anuidade&id=${id}`
        })
        .then(response => response.text())
        .then(data => {
            alert("Anuidade excluída com sucesso!");
            location.reload();
        })
        .catch(error => console.error("Erro ao excluir anuidade:", error));
    }
}

function editAnuidade(id, ano, valor) {
    modalEdicaoAnuidade.style.display = 'flex';

    // Preencher o formulário de edição de anuidade com os valores já existentes
    modalEdicaoAnuidade.querySelector('input[name="ano"]').value = ano;
    modalEdicaoAnuidade.querySelector('input[name="valor"]').value = valor;
    
    // Adicionar o ID da anuidade que vai ser editada
    modalEdicaoAnuidade.querySelector('input[name="id"]').value = id;
}

function editAssociado(id, nome, email, cpf, dataFiliacao) {
    modalEdicaoAssociado.style.display = 'flex';

    // Preencher o formulário com os dados já existentes
    modalEdicaoAssociado.querySelector('input[name="nome"]').value = nome;
    modalEdicaoAssociado.querySelector('input[name="email"]').value = email;
    modalEdicaoAssociado.querySelector('input[name="cpf"]').value = cpf;
    modalEdicaoAssociado.querySelector('input[name="dataFiliacao"]').value = dataFiliacao;

    // Adicionar o ID do associado que vai ser editado
    modalEdicaoAssociado.querySelector('input[name="formulario"]').value = 'editar-associado';
    modalEdicaoAssociado.querySelector('input[name="id"]').value = id;
}
