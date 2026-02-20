const inputValor = document.getElementById("valor");
const inputQuantidade = document.getElementById("quantidade");
const botaoAdicionar = document.getElementById("botaoAdicionar");
const botaoEditar = document.getElementById("botaoEditar");
let timeout;

function formatarMoeda(e) {    

    var v = e.target.value.replace(/\D/g, "");

    v = (v / 100).toFixed(2) + "";

    v = v.replace(".", ",");

    v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");

    v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");

    e.target.value = v;

}

function formatarLimite(e) {    

    let textoFormatado = e.target.value.replace(/\D/g, "");

    if (textoFormatado.length > 10) {
        textoFormatado = textoFormatado.slice(0, 10);
    }

    e.target.value = textoFormatado;
}

function formatarCaractere(e) {
    if (isNaN(e.key)) {
        e.preventDefault();
    }

    botaoEditar.disabled = true;

    clearTimeout(timeout);
    timeout = setTimeout(() => {
        botaoEditar.disabled = false;
    }, 500);
}

inputValor.addEventListener("keyup", formatarMoeda);
inputValor.addEventListener("input", formatarLimite);
inputValor.addEventListener("input", formatarCaractere);
inputQuantidade.addEventListener("input", formatarLimite);
inputQuantidade.addEventListener("input", formatarCaractere);

document.addEventListener("DOMContentLoaded", function () {
    if (inputValor.value !== "") {
        formatarMoeda({ target: inputValor });
    }
});