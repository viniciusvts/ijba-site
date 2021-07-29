<?php
// https://developer.wordpress.org/rest-api/extending-the-rest-api/adding-custom-endpoints/
/**
 * Atende a requisição enviando um email para o adm do site
 * @author Vinicius de Santana
 */
function ssw_integra_teams_itau(){
    // começa assumindo que o request é false
    $isRequestOk = isset($_POST['email']);
    if($isRequestOk){
        $validNonce = wp_verify_nonce($_POST['_nonce']);
        $isRequestOk = true;//($validNonce == 1);
    }
    /*
    ATENÇÂO PROGRAMADOR DO FUTURO!!!!
    veja a regra de negócio em @link single-curso.php:50
    */
    $terms = get_the_terms($_POST['curso'], 'categoria_curso');
    /** slugs no qual o curso está iserido */
    $catSlugs = array_map(function($term){
        return $term->slug;
    }, $terms);
    $cursosQueGeramBoleto = array('aperfeicoamento', 'extensao', 'curta-duracao');
    $canGenerateBoleto = false;
    foreach ($cursosQueGeramBoleto as $value) {
        if (in_array($value, $catSlugs)){
            $canGenerateBoleto = true;
            break;
        }
    }
    /** [0]preço, [1]parcelas */
    $precoParcelas = explode('|', $_POST['precoParcelas']);
    if($isRequestOk && $canGenerateBoleto){
        // gera boleto
        // sanitize inputs
        $pattern = '/(\.|-|,|\/|\s)/';
        $sanitized_cpf_cnpj_pagador = preg_replace($pattern, '', $_POST['cpf_cnpj_pagador']);
        $sanitized_cep_pagador = preg_replace($pattern, '', $_POST['cep_pagador']);
        $pagador = array(
            "cpf_cnpj_pagador" => $sanitized_cpf_cnpj_pagador,
            "nome_pagador" => $_POST['nome'],
            "logradouro_pagador" => $_POST['logradouro_pagador'],
            "bairro_pagador" => $_POST['bairro_pagador'],
            "cidade_pagador" => $_POST['cidade_pagador'],
            "uf_pagador" => $_POST['uf_pagador'],
            "cep_pagador" => $sanitized_cep_pagador,
            "grupo_email_pagador" => array(
                "email_pagador" => $_POST['email'],
            ),
        );
        //aqui vai ter um case para o valor do curso de acordo com o curso selecionado.
        // transformar em numeros
        $floatpreco = floatval($precoParcelas[0]);
        $valorDoBoleto = number_format($floatpreco, 2);

        $parcField = intval($precoParcelas[1]);
        
        $vencimento = new DateTime();
        $vencimento->modify('+5 days'); // configura o vencimento para mais 5 dias

        // gera um boleto para cada parcela
        $SSW_ITAUI = new ssw_itaui_wp();
        $boletosLinks = [];
        for ($i=1; $i <= $parcField; $i++) {
            $boleto = $SSW_ITAUI->registerBoleto($valorDoBoleto, $vencimento, $pagador);
            if(!$boleto->pagador){
                $isRequestOk = false;
                break;
            }
            $boletosLinks[] = getBoletoLink($boleto);
            $vencimento->modify('+1 month');
        }
    }
    if($isRequestOk){
        // envia email para o adm
        $to = get_option('admin_email'); // email para o usuário
        $subject = 'Inscrição de aluno IBA';
        $message .= '<h2>Dados do usuário: </h2>';

        // aqui pego o preço e a parcela que o user eescolheu
        if ($canGenerateBoleto){
            $message .= '<p>preço: ' . $precoParcelas[0] . '</p>';
            $message .= '<p>parcelas: ' . $precoParcelas[1] . '</p>';
        }
        foreach ($_POST as $key => $value) {
            $message .= '<p>' . $key . ': ' . $value . '</p>';
        }
        if(isset($boletosLinks)){
            $message .= '<p>Segue link dos boletos:</p>';
            foreach ($boletosLinks as $key => $boleto) {
                $position = $key + 1;
                $message .= '<p>' . $position . ': ' . $boleto . '</p>';
            }
        }
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $wpmail = wp_mail( $to, $subject, $message, $headers );
        // end send email
    }
    $cursosQueCadastramNoTeams = array('aperfeicoamento', 'extensao');
    $canCadastroTeams = $_POST['teams'] == 'true';
    foreach ($cursosQueCadastramNoTeams as $value) {
        if (in_array($value, $catSlugs)){
            $canCadastroTeams = true;
            break;
        }
    }
    // se ainda está tudo certo cria cliente
    if($isRequestOk && $canCadastroTeams){
        $SSWTI = new ssw_tint_wp();
        // create user
        $nameLowerCase = strtolower($_POST['nome']);
        $nameWithoutSpaces = str_replace(' ', '', $nameLowerCase);
        $emailIJBA = $nameWithoutSpaces.'@ijbaead.onmicrosoft.com';
        $userCreated = $SSWTI->createUser(true,
            $_POST['nome'], 
            null,
            $nameWithoutSpaces,
            $emailIJBA);
        // guarda o id
        if($userCreated->id){
            $usersCreated[] = $userCreated->id;
            $groupIdSelected = get_option(SSW_TEAMSI_GROUP);
            $groupResponse = $SSWTI->moveUserToGroup($usersCreated, $groupIdSelected);
        }
        if(isset($userCreated->error) || isset($groupResponse->error)){
            $isRequestOk = false;
        }
    }
    if($isRequestOk && $canCadastroTeams){
        // envia email depois de excluir url e identificador
        $to = $_POST['email']; // email para o usuário
        $subject = 'Dados do seu curso IJBA';
        $message = '<p>Usuário no teams: ' . $emailIJBA . '</p>';
        $message .= '<p>Senha: BemVindo910</p>';
        $message .= '<p>Segue link dos boletos:</p>';
        if(isset($boletosLinks)){
            foreach ($boletosLinks as $key => $boleto) {
                $position = $key + 1;
                $message .= '<p>' .$position . ': ' . $boleto . '</p>';
            }
        }
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $wpmail = wp_mail( $to, $subject, $message, $headers );
        // end send email
    }
    $canRedirect = in_array('pos-graduacao', $catSlugs);
    $link_redirect = get_field('link_redirect', $_POST['curso']);
    if($link_redirect && $canRedirect){
        $url = $link_redirect;
    } else {
        $url = get_option('siteurl') . '/agradecimento-inscricao/?isRequestOk=' . $isRequestOk;
    }
    // redireciona para o agradecimento
    wp_redirect($url);
    exit;
}
/**
 * Função registra os endpoints
 * @author Vinicius de Santana
 */
function ssw_register_enpoints_ijba(){
  //Solicitar contato
  register_rest_route('dna_theme/v1',
    '/integra-teams-itau',
    array(
      'methods' => 'POST',
      'callback' => 'ssw_integra_teams_itau',
      'description' => 'recebe as informações do form e envia um email notificando o adm do site',
      'args' => array(
        'email' => array(
          'required' => true,
        ),
      )
    )
  );
}

add_action('rest_api_init', 'ssw_register_enpoints_ijba');
