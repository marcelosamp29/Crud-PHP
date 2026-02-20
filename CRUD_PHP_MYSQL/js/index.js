const valores = document.querySelectorAll(".valor");

function formatarMoedae(e) {
    let v = e.textContent.replace(/\D/g, "");

    v = (v / 100).toFixed(2);
    v = v.replace(".", ",");

    v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
    v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");

    e.textContent = "R$ " + v;
}

document.addEventListener("DOMContentLoaded", () => {
    valores.forEach(valor => {
        if (valor.textContent.trim() !== "") {
            formatarMoedae(valor);
        }
    });
});
