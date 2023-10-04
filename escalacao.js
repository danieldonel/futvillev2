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

function trocaimagem(posicao, f, bt)
{
    if(posicao == "goleiro")
    {
        if(document.getElementById(bt).innerText == "COMPRAR")
        {
            goleiro.style.backgroundImage = "url(\"data:image/png;base64," +f+"\")"
            goleiro.style.backgroundSize = "100% 100%"
            goleiro.style.backgroundRepeat = no-repeat;
        }

        else
        {
            goleiro.style.backgroundImage = ""
        }
    }

    if(posicao == "atacante")
    {
        
        if(atacante1.style.backgroundImage == "")
        {
            atacante1.style.backgroundImage = "url(\"data:image/png;base64," +f+"\")"
            atacante1.style.backgroundSize = "100% 100%"
            atacante1.style.backgroundRepeat = "no-repeat"
        }

        else if(atacante2.style.backgroundImage == "")
            {
                atacante2.style.backgroundImage = "url(\"data:image/png;base64," +f+"\")"
                atacante2.style.backgroundSize = "40px"
                atacante2.style.backgroundRepeat = "no-repeat"
            }
        

            else
            {
                if(atacante3.style.backgroundImage == "")
                {
                    atacante3.style.backgroundImage = "url(\"data:image/png;base64," +f+"\")"
                    atacante3.style.backgroundSize = "40px"
                    atacante3.style.backgroundRepeat = "no-repeat"
                }
            }
    }

}