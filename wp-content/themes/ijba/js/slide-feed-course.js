//script para slider
let sliders;
let bullets;
let containerSliders;
let itensSliders;
let range;

//primeiro pega os botãoes de navegação
let navsPrev = document.querySelectorAll('.navPrev');
let navsNext = document.querySelectorAll('.navNext');

// ao clicar no arrow prev, pega o id do slider a ser percorrido e o sentido que o scroll deverá se movimentar
for (navPrev of navsPrev) {
    navPrev.onclick = function() {
        readySlider(this.parentElement.getAttribute("id-slider"), 'anterior', this);
    }
}

// ao clicar no arrow prev, pega o id do slider a ser percorrido e o sentido que o scroll deverá se movimentar
for (navNext of navsNext) {
    navNext.onclick = function() {
        readySlider(this.parentElement.getAttribute("id-slider"), 'proximo', this);
    }
}

//pega o id do slider(através de uma string template ${}), que precisa ser percorrido e seu sentido. Para que a função não percorra todos os sliders da tela
function readySlider(idSlider, sentido, objetoClicado) {
    sliders = document.querySelectorAll(`#${idSlider} .slider-course`);
    itensSliders = document.querySelectorAll(`#${idSlider} .itens-slider-course`);
    containerSliders = document.querySelectorAll(`#${idSlider} .container-slider-course`);
    itemSlider = document.querySelectorAll(`#${idSlider} .item-slider-course`);
    bullets = document.querySelectorAll(`#${idSlider} .bullets-slider-course ul li`);

    //percorro os bullets, e vejo o index(var range) que está com a classe ativa.
    //Com esse index posso multiplicar pelo tamanho do card(300px) e fazer com que o scroll se mova de acordo com esse multiplicador(index)       
    for (containerSlider of containerSliders) {
        for (range = 0; range < bullets.length; range++) {

            if (sentido === 'proximo' && containerSlider.scrollLeft < itensSliders[0].offsetWidth && bullets[range].classList.contains('active')) {
                containerSlider.scrollLeft = (bullets[range + 1].getAttribute('index-bullet')) * (itemSlider[0].offsetWidth);
                //depois de mover o scroll, coloca o ativo no bullet anterior
                bullets[range + 1].classList.add('active');
                bullets[range].classList.remove('active');
                break;
            } else {
                if (sentido === 'anterior' && bullets[range].classList.contains('active')) {
                    containerSlider.scrollLeft = (bullets[range - 1].getAttribute('index-bullet')) * (itemSlider[0].offsetWidth);
                    bullets[range - 1].classList.add('active');
                    bullets[range].classList.remove('active');
                    break;
                }
            }

        }

        containerSlider.onscroll = function() {
            // verifica se o scroll está na posição inicial ou final, para esconder a seta de navegação
            if (this.scrollLeft + itemSlider[0].offsetWidth >= itensSliders[0].offsetWidth || this.scrollLeft == 0) {
                objetoClicado.setAttribute("style", "opacity:0.1");
                objetoClicado.setAttribute("disabled", true);
            } else {
                objetoClicado.parentElement.children[0].setAttribute("style", "opacity:1");
                objetoClicado.parentElement.children[1].setAttribute("style", "opacity:1");


                objetoClicado.parentElement.children[0].removeAttribute("disabled");
                objetoClicado.parentElement.children[1].removeAttribute("disabled");
            }
        }
    }
}