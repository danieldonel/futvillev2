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

function filtrarAtacantes() {
    // Obtém todos os jogadores no mercado
    var jogadores = document.querySelectorAll('.tudo');

    // Itera sobre todos os jogadores e verifica a posição
    for (var i = 0; i < jogadores.length; i++) {
        var jogador = jogadores[i];
        var posicao = jogador.getAttribute('data-posicao');
        if (posicao !== 'atacante') {
            // Esconde jogadores que não são atacantes
            jogador.style.display = 'none';
        } else {
            // Mostra jogadores que são atacantes
            jogador.style.display = 'block';
        }
    }
}

function filtrarMeias() {
    // Obtém todos os jogadores no mercado
    var jogadores = document.querySelectorAll('.tudo');

    // Itera sobre todos os jogadores e verifica a posição
    for (var i = 0; i < jogadores.length; i++) {
        var jogador = jogadores[i];
        var posicao = jogador.getAttribute('data-posicao');
        if (posicao !== 'meio-campo') {
            // Esconde jogadores que não são atacantes
            jogador.style.display = 'none';
        } else {
            // Mostra jogadores que são atacantes
            jogador.style.display = 'block';
        }
    }
}

function filtrarZagueiros() {
    // Obtém todos os jogadores no mercado
    var jogadores = document.querySelectorAll('.tudo');

    // Itera sobre todos os jogadores e verifica a posição
    for (var i = 0; i < jogadores.length; i++) {
        var jogador = jogadores[i];
        var posicao = jogador.getAttribute('data-posicao');
        if (posicao !== 'zagueiro') {
            // Esconde jogadores que não são atacantes
            jogador.style.display = 'none';
        } else {
            // Mostra jogadores que são atacantes
            jogador.style.display = 'block';
        }
    }
}


function filtrarLaterais() {
    // Obtém todos os jogadores no mercado
    var jogadores = document.querySelectorAll('.tudo');

    // Itera sobre todos os jogadores e verifica a posição
    for (var i = 0; i < jogadores.length; i++) {
        var jogador = jogadores[i];
        var posicao = jogador.getAttribute('data-posicao');
        if (posicao !== 'lateral') {
            // Esconde jogadores que não são atacantes
            jogador.style.display = 'none';
        } else {
            // Mostra jogadores que são atacantes
            jogador.style.display = 'block';
        }
    }
}

function filtrarGoleiro() {
    // Obtém todos os jogadores no mercado
    var jogadores = document.querySelectorAll('.tudo');

    // Itera sobre todos os jogadores e verifica a posição
    for (var i = 0; i < jogadores.length; i++) {
        var jogador = jogadores[i];
        var posicao = jogador.getAttribute('data-posicao');
        if (posicao !== 'goleiro') {
            // Esconde jogadores que não são atacantes
            jogador.style.display = 'none';
        } else {
            // Mostra jogadores que são atacantes
            jogador.style.display = 'block';
        }
    }
}

$(document).ready(function() {
    $(".botao-comprar").click(function() {
        var jogadorId = $(this).attr("id");
        $.ajax({
            type: "POST",
            url: "adicionar_jogador.php", // Arquivo PHP para processar a solicitação
            data: { jogadorId: jogadorId },
            success: function(response) {
                alert(response); // Exibe a resposta do servidor (por exemplo, "Jogador adicionado com sucesso")
            }
        });
    });
});