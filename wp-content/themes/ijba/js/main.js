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
        initCursoForm();
    }
    /**
     * executa a lógica de buscar preço dos cursos no formulário de inscrição
     * @author Vinicius de Santana
     */
    function initCursoForm(){
        /** @type HTMLElement */
        var curso = querySelector('#form-teams-itau #curso');
        if(!curso) return;
        // evento no select do curso
        curso.addEventListener('change', cursoIntegracaoEvt);
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
    function cursoIntegracaoEvt(evt){
        // limpa o  input e mostra "carregando..."
        // https://developer.mozilla.org/pt-BR/docs/Web/API/HTMLOptionElement/Option
        /** @type HTMLElement */
        var precoParcelas = querySelector('#form-teams-itau #precoParcelas');
        precoParcelas.options.length = 0;
        var cursoId = evt.target.value;
        if (cursoId == ''){
            precoParcelas.options.add(new Option('Selecione um curso primeiro', ''));
            return;
        }
        precoParcelas.options.add(new Option('Carregando...', ''));
        // carrega
        var url = '/wp-json/acf/v3/curso/'+cursoId+'/preco/';
        fetch(url)
        .then(resp => resp.json())
        .then(json => {
            console.warn(json);
            //limpa novamente e lança "Selecione"
            precoParcelas.options.length = 0;
            precoParcelas.options.add(new Option('Selecione uma parcela', ''));
            //popula o HTMLOptionCollection
            for (const item of json.preco) {
                var parcStr = item.qtd_parce == 1 ? 'parcela' : 'parcelas';
                var precoNumber = Number(item.preco);
                var custo = precoNumber.toLocaleString('pt-BR',{ style: 'currency', currency: 'BRL' });

                var optionValue = item.preco + '|' + item.qtd_parce;
                var optionText = item.qtd_parce + ' ' + parcStr + ' de ' + custo;
                precoParcelas.options.add(new Option(optionText, optionValue));
            }
        });
    }
})(window, document, console, x=>document.querySelector(x), x=>document.querySelectorAll(x));