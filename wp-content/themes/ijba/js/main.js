//https://javascript-minifier.com/
//https://skalman.github.io/UglifyJS-online/
(function ssw(window, document, console, querySelector, querySelectorAll) {
    // nav menu
    document.addEventListener("DOMContentLoaded", DOMContentLoaded);
    // window.addEventListener("load", load);
    /** O evento DOMContentLoaded é acionado quando todo o HTML foi
     * completamente carregado e analisado, sem aguardar pelo CSS, imagens,
     * e subframes para encerrar o carregamento.
     */
    function DOMContentLoaded(evt) {
        // provoca a mudança do header conforme o scroll da página
        window.onscroll = function() {
            let menuFixed = document.getElementById("menu-fixed");
        
            if (window.innerWidth > 768) {
                if (this.scrollY > 90) {
                    menuFixed.setAttribute("style", "background-color:#0a2724");
                } else {
                    menuFixed.setAttribute("style", "background:transparent");
                }
            }
        }
        // executa mascara de telefone
        try {
            querySelector('#phone').addEventListener('keyup',execMascaraTel);
        } catch (error) {
            console.warn('Erro ao definir mascara telefone: ', error);
        }
        try {
            querySelector('[name="telefone"]').addEventListener('keyup',execMascaraTel);
        } catch (error) {
            console.warn('Erro ao definir mascara telefone: ', error);
        }
        // executa mascara de cep na inscrição
        try {
            querySelector('#cep_pagador').addEventListener('keyup',execMascaraCEP);
        } catch (error) {
            console.warn('Erro ao definir mascara cep: ', error);
        }
    }
    /**
     * Mascara de Telefone para ser usada em inputs html
     * @param {KeyboardEvent} evt - O evento será entregue aqui
     * @example <caption>Executa a mascara quando evento keyup é lançado.</caption>
     * document.querySelector('#phone').addEventListener('keyup',execMascaraTel);
     * @author Vinicius de Santana <vinicius.vts@gmail.com>
     * @license CC BY-NC
     */
    function execMascaraTel (evt) {
        let v = evt.target.value;
        v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
        v=v.replace(/^(\d{11})(\d*)/g,"$1"); // remove o excedente de 11 digitos
        v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
        v=v.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca - depois dos 4 digitos após ()
        evt.target.value = v;
    }
    /**
     * Mascara de CPF para ser usada em inputs html
     * @param {KeyboardEvent} evt - O evento será entregue aqui
     * @example <caption>Executa a mascara quando evento keyup é lançado.</caption>
     * document.querySelector('#cep').addEventListener('keyup',execMascaraCEP);
     * @author Vinicius de Santana <vinicius.vts@gmail.com>
     * @license CC BY-NC
     */
    function execMascaraCEP (evt) {
      let v = evt.target.value;
      v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
      v=v.replace(/^(\d{8})(\d)/g,"$1"); //Remove mais de 8 digitos
      // Coloca a pontuação do CEP
      v=v.replace(/^(\d{5})(\d)/g,"$1-$2");
      evt.target.value = v;
    }
})(window, document, console, x=>document.querySelector(x), x=>document.querySelectorAll(x));