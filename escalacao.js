    document.addEventListener("DOMContentLoaded", function () {
        const buttons = document.querySelectorAll(".comprar");

        buttons.forEach(button => {
            button.addEventListener("click", function () {
                if (button.getAttribute("data-action") === "comprar") {
                    button.innerHTML = "VENDER";
                    button.setAttribute("data-action", "vender");
                    button.classList.remove("botao-comprar");
                    button.classList.add("botao-vender");
                } else if (button.getAttribute("data-action") === "vender") {
                    button.innerHTML = "COMPRAR";
                    button.setAttribute("data-action", "comprar");
                    button.classList.remove("botao-vender");
                    button.classList.add("botao-comprar");
                }
            });
        });
    });

