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
    if($isRequestOk){
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
        $precoField = get_field('preco', $_POST['curso']);
        // transformar em numeros
        $floatpreco = floatval($precoField['preco']);
        $valorDoBoleto = number_format($floatpreco, 2);

        $parcField = intval($precoField['qtd_parce']);
        
        $vencimento = new DateTime();
        $vencimento->modify('+5 days'); // configura o vencimento para mais 5 dias

        // gera um boleto para cada parcela
        $SSW_ITAUI = new ssw_itaui_wp();
        $boletosLinks = [];
        for ($i=1; $i <= $parcField; $i++) {
            $boleto = $SSW_ITAUI->registerBoleto($valorDoBoleto, $vencimento, $pagador, true);
            if(!$boleto->pagador){
                $isRequestOk = false;
                break;
            }
            $boletosLinks[] = getBoletoLink($boleto);
            $vencimento->modify('+1 month');
        }
    }
    /** @todo fazer (ou não) a convesão com os boletos para o rd*/ 
    // if($isRequestOk){
    //     // não dá para enviar todos os boletos de vez
    //     // error_message:"Must have length below or equal to '4096'."
    //     $RDI = new Rdi_wp();
    //     $data = array(
    //         'email' => $email,
    //         'cf_boletos_gerados' => implode(",\n", $boletosLinks),
    //     );
    //     $statusRD = $RDI->sendConversionEvent('boletosgerados', $data);
    //     $isRequestOk = isset($$statusRD->event_uuid);
    // }
    // se ainda está tudo certo envia boleta para cliente
    if($isRequestOk){
        // envia email para o adm
        $to = get_option('admin_email'); // email para o usuário
        $subject = 'Inscrição de aluno IBA';
        $message .= '<h2>Dados do usuário: </h2>';
        foreach ($_POST as $key => $value) {
            $message .= '<p>' . $key . ': ' . $value . '</p>';
        }
        $message .= '<p>Segue link dos boletos:</p>';
        foreach ($boletosLinks as $key => $boleto) {
            $position = $key + 1;
            $message .= '<p>' . $position . ': ' . $boleto . '</p>';
        }
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $wpmail = wp_mail( $to, $subject, $message, $headers );
        // end send email
    }
    // se ainda está tudo certo cria cliente
    if($isRequestOk){
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
        // if($userCreated->id){
        //     $usersCreated[] = $userCreated->id;
        //     $groupIdSelected = get_option(SSW_TEAMSI_GROUP);
        //     $groupResponse = $SSWTI->moveUserToGroup($usersCreated, $groupIdSelected);
        // }
        if(isset($userCreated->error)){ // || isset($groupResponse->error)){
            $isRequestOk = false;
        }
    }
    if($isRequestOk){
        // envia email depois de excluir url e identificador
        $to = $_POST['email']; // email para o usuário
        $subject = 'Dados do seu curso IJBA';
        $message = '<p>Usuário no teams: ' . $emailIJBA . '</p>';
        $message .= '<p>Senha: BemVindo910</p>';
        $message .= '<p>Segue link dos boletos:</p>';
        foreach ($boletosLinks as $key => $boleto) {
            $position = $key + 1;
            $message .= '<p>' .$position . ': ' . $boleto . '</p>';
        }
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $wpmail = wp_mail( $to, $subject, $message, $headers );
        // end send email
    }
  $url = get_option('siteurl') . '/agradecimento-inscricao/?isRequestOk=' . $isRequestOk;
  //vai para o url
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
