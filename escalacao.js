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
        } v
    }
}

$(document).ready(function () {
    $(".botao-comprar").on("click", function () {
        var idJogador = $(this).data("id");
        var posicao = $(this).data("posicao");

        // Use $.ajax em vez de ajax
        $.ajax({
            type: "POST",
            url: "adicionar_escalacao.php",
            data: { id_jogador: idJogador, posicao: posicao },
            success: function (response) {
                // Manipular a resposta do servidor, se necessário
                console.log(response);

                // Se a resposta for um JSON, você pode acessar os dados assim:
                // var jsonData = JSON.parse(response);
                // console.log(jsonData);
                window.location.reload();
            },
            error: function (error) {
                // Lidar com erros, se houver
                console.error(error);
            }
        });
    });
});

$(document).ready(function () {
    $(".botao-vender").on("click", function () {
        var idJogador = $(this).data("id");
        var posicao = $(this).data("posicao");

        // Use $.ajax em vez de ajax
        $.ajax({
            type: "POST",
            url: "remover_escalacao.php",
            data: { id_jogador: idJogador, posicao: posicao },
            success: function (response) {
                // Manipular a resposta do servidor, se necessário
                console.log(response);

                // Se a resposta for um JSON, você pode acessar os dados assim:
                // var jsonData = JSON.parse(response);
                // console.log(jsonData);
                window.location.reload();
            },
            error: function (error) {
                // Lidar com erros, se houver
                console.error(error);
            }
        });
    });
});