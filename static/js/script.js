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