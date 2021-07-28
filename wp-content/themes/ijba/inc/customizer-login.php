<?php
// Altera a logo e o bg:
function sswCustomizeLoginLogo() {
?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/ijba.png);
            height:65px;
            width:320px;
            background-size: 320px 65px;
            background-repeat: no-repeat;
            background-size: contain;
        	padding-bottom: 30px;
        }
        body.login {
            background: #0a2724;
        }
        input#wp-submit{
            background-color: #0a2724;
            border-color: #0a2724;
        }
        input#user_login:focus{
            border-color: #0a2724;
        }
        input#user_pass:focus{
            border-color: #0a2724;
        }
        input#wp-submit:hover{
            background-color: #183e3a;
        }
        /* icone da senha */
        .login .button.wp-hide-pw .dashicons::before{
            color: #0a2724;
        }
        /* links footer */
        .login #backtoblog a, .login #nav a{
            color: white!important;
        }
    </style>
<?php
}
add_action( 'login_enqueue_scripts', 'sswCustomizeLoginLogo' );

// altera o link do header
function sswLoginLogoUrl() {
    return home_url();
}
add_filter( 'login_headerurl', 'sswLoginLogoUrl' );