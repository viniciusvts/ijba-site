/*!Vinicius de Santana*/
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
        startGreenBox();
    }

    /** O evento de carga é disparado quando toda a página é carregada,
     * incluindo todos os recursos dependentes, como folhas de estilo e imagens.
     */
    // function load(evt) {
    //     console.log('load', evt);
    // }

    /** todos os menus togllers definidos com a classe "navTogller" são acessador e atribuem
     * a classe "active" a seus respectivos "data-target"
     */
    function startGreenBox() {
        if (!document.forms.greenbox == 'undefined') return;
        /** @type HTMLElement */
        var catInput = querySelector('#cat_curso');
        /** @type HTMLElement */
        var cursoInput = querySelector('#curso');
        // a função do wordpres não adiciona required ao dropdown de curso
        cursoInput.setAttribute('required', 'required');
        // adiciona o evento do input de categoria
        catInput.addEventListener('change', catInputEvent);
    }

    function catInputEvent(evt){
        /** @type HTMLElement */
        var cursoInput = querySelector('#curso');
        var catId = evt.target.value;
        var url = '/wp-json/wp/v2/curso?per_page=100';
        if (catId != ''){
            url += '&categoria_curso=' + catId;
        }
        // limpa o curso input e mostra "carregando..."
        // https://developer.mozilla.org/pt-BR/docs/Web/API/HTMLOptionElement/Option
        cursoInput.options.length = 0;
        cursoInput.options.add(new Option('Carregando...', ''));
        // carrega
        fetch(url)
        .then(resp => resp.json())
        .then(json => {
            //limpa novamente e lança "Selecione"
            cursoInput.options.length = 0;
            cursoInput.options.add(new Option('Selecione o tipo', ''));
            //popula o HTMLOptionCollection
            for (const item of json) {
                cursoInput.options.add(new Option(item.title.rendered, item.slug));
            }
        });
    }
})(window, document, console, x=>document.querySelector(x), x=>document.querySelectorAll(x));