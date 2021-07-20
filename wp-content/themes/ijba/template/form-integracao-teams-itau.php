<?php

/** Array que contém o slug das categorias do curso */
$catSlugs = array_map(function($term){
    return $term->slug;
}, $terms);
$isPosGraduacao = in_array('pos-graduacao', $catSlugs);
$cursosSelect = get_posts(array(
	'numberposts'	=> -1,
	'post_type'		=> 'curso',
	'meta_key'		=> 'preco',
));
?>
<form class="row"
id="form-teams-itau"
action="<?php echo get_option('siteurl'); ?>/wp-json/dna_theme/v1/integra-teams-itau/"
method="post">
    <input type="hidden" name="_nonce" value="<?php echo wp_create_nonce(); ?>">

    <div class="col-12">
        <label for="nome">Nome *</label>
        <input type="text" name="nome" id="nome" required>
    </div>
    
    <div class="col-md-7">
        <label for="email">Email *</label>
        <input type="email" name="email" id="email" required>
    </div>

    <div class="col-md-5">
        <label for="phone">Telefone *</label>
        <input type="text" name="phone" id="phone" required>
    </div>
    
    <div class="col-md-7">
        <label for="cidade_pagador">Cidade *</label>
        <input type="text" name="cidade_pagador" id="cidade_pagador" required>
    </div>

    <div class="col-md-5">
        <label for="uf_pagador">Estado *</label>
        <select name="uf_pagador" id="uf_pagador" required>
            <option value="">Selecione um estado</option>
            <option value="AC">AC</option>
            <option value="AL">AL</option>
            <option value="AP">AP</option>
            <option value="AM">AM</option>
            <option value="BA">BA</option>
            <option value="CE">CE</option>
            <option value="DF">DF</option>
            <option value="DF">DF</option>
            <option value="ES">ES</option>
            <option value="GO">GO</option>
            <option value="MA">MA</option>
            <option value="MT">MT</option>
            <option value="MS">MS</option>
            <option value="MG">MG</option>
            <option value="PA">PA</option>
            <option value="PB">PB</option>
            <option value="PR">PR</option>
            <option value="PE">PE</option>
            <option value="PI">PI</option>
            <option value="RJ">RJ</option>
            <option value="RN">RN</option>
            <option value="RS">RS</option>
            <option value="RO">RO</option>
            <option value="RR">RR</option>
            <option value="SC">SC</option>
            <option value="SP">SP</option>
            <option value="SE">SE</option>
            <option value="TO">TO</option>
        </select>
    </div>

    <div class="col-7">
        <label for="logradouro_pagador">Endereço *</label>
        <input type="text" name="logradouro_pagador" id="logradouro_pagador" required>
    </div>

    <div class="col-md-5">
        <label for="cpf_cnpj_pagador">CPF/CNPJ *</label>
        <input type="text" name="cpf_cnpj_pagador" id="cpf_cnpj_pagador" required>
    </div>
    
    <div class="col-md-7">
        <label for="bairro_pagador">Bairro *</label>
        <input type="text" name="bairro_pagador" id="bairro_pagador" required>
    </div>

    <div class="col-md-5">
        <label for="cep_pagador">CEP *</label>
        <input type="text" name="cep_pagador" id="cep_pagador" placeholder="Cep" required>
    </div>
    
    <div class="col-md-7 <?php echo $isPosGraduacao?'d-none':''; ?>">
        <label for="curso">Curso *</label>
        <select name="curso" id="curso" required>
            <option value="">Selecione um curso</option>
            <?php
            foreach ($cursosSelect as $key => $curso) {
                $precoField = get_field('preco', $curso->ID);
                $optionDesc = $curso->post_title;
                $isSelected = (isset($_GET['cursoId']) && ($_GET['cursoId'] == $curso->ID));
                if($isSelected){ // guardo o id do curso para o select de preço
                    $cursoSelectedID = $curso->ID;
                }

            ?>
                <option value="<?php echo $curso->ID; ?>"
                <?php if($isSelected){ echo 'selected'; } ?>>
                    <?php echo $optionDesc; ?>
                </option>
            <?php
            }
            ?>
        </select>
    </div>
    
    <div class="col-md-5 <?php echo $isPosGraduacao?'d-none':''; ?>">
        <label for="precoParcelas">Parcelas do curso *</label>
        <select name="precoParcelas" id="precoParcelas" required>
            <option value="">Selecione uma parcela</option>
            <?php
            // se tem curso selecionado lanço os valores no select de preço,
            // caso negativo, deixo o select de preço vazio
            if (isset($cursoSelectedID)){
                $precoField = get_field('preco', $cursoSelectedID);
                foreach ($precoField as $key => $item) {
                    $qtd_parc = $item['qtd_parce'];
                    $parcStr = $item['qtd_parce'] == 1 ? 'parcela' : 'parcelas';
                    $custo = number_format($item['preco'], 2, ',', '.');
                    $optionValue = $item['preco'].'|'.$item['qtd_parce'];
                    $optionText = $qtd_parc.' '.$parcStr.' de R$ '.$custo;
            ?>
                <option value="<?php echo $optionValue; ?>" <?php echo $key==0?'selected':''; ?>>
                <?php echo $optionText; ?>
                </option>
            <?php
                }
            }
            ?>
        </select>
    </div>
    
    <?php
    if(isset($_GET['teams'])){
        echo '<input type="hidden" name="teams" value="true">';
    }
    ?>

    <p>* Campos obrigatórios</p>
    <button class="green w-50 mx-auto" type="submit">Inscrever</button>
</form>