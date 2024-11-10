const abrirModalCadastroAssociados = document.querySelector(".btn-adicionar-associados");
const btnFecharModalCadastroAssociados = document.querySelector(".btn-fechar-modal");
const modalCadastroAssociados = document.querySelector(".modal-cadastro-associados");
const btnAbrirModalCadastroAnuidade = document.querySelector(".btn-adicionar-anuidade")
const modalCadastroAnuidade = document.querySelector(".modal-cadastro-anuidade");
const btnFecharModalCadastroAnuidade = document.querySelector("#fechar-modal-anuidade")

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
            location.reload(); // Recarrega a página para atualizar a lista
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
            location.reload(); // Recarrega a página para atualizar a lista
        })
        .catch(error => console.error("Erro ao excluir anuidade:", error));
    }
}