<?php
/*
** Template Name: Inscription
*/
get_header();
?>

<?php

global $wpdb, $user_ID;  
if (!$user_ID) {  
    
if (isset($_POST['user_registeration']))
{
    //registration_validation($_POST['username'], $_POST['useremail']);
    global $reg_errors;
    $reg_errors = new WP_Error;
    $username=$_POST['username'];
    $useremail=$_POST['useremail'];
    $password=$_POST['password'];
    
    
    if(empty( $username ) || empty( $useremail ) || empty($password))
    {
        $reg_errors->add('field', "Le champ de formulaire requis est manquant");
    }    
    if ( 6 > strlen( $username ) )
    {
        $reg_errors->add('username_length', "Identifiant trop court. Au moins 6 charactères sont requis" );
    }
    if ( username_exists( $username ) )
    {
        $reg_errors->add('user_name', "Cet identifiant existe déjà!");
    }
    if ( ! validate_username( $username ) )
    {
        $reg_errors->add( 'username_invalid', "L'identifiant n'est pas correct" );
    }
    if ( !is_email( $useremail ) )
    {
        $reg_errors->add( 'email_invalid', "L'email n'est pas correct!" );
    }
    
    if ( email_exists( $useremail ) )
    {
        $reg_errors->add( 'email', "Cet email existe déjà!" );
    }
    if ( 5 > strlen( $password ) ) {
        $reg_errors->add( 'password', "Le mot de passe doit comprendre au moins 5 lettres!" );
    }
    
    if (is_wp_error( $reg_errors ))
    { 
        foreach ( $reg_errors->get_error_messages() as $error )
        {
             $signUpError='<p style="color:#FF0000; text-aling:left;"><strong>ERREUR</strong>: '.$error . '<br /></p>';
        } 
    }
    
    
    if ( 1 > count( $reg_errors->get_error_messages() ) )
    {
        global $username, $useremail;
        $username   =   sanitize_user( $_POST['username'] );
        $useremail  =   sanitize_email( $_POST['useremail'] );
        $password   =   esc_attr( $_POST['password'] );
        
        $userdata = array(
            'user_login'    =>   $username,
            'user_email'    =>   $useremail,
            'user_pass'     =>   $password,
            );
        $user = wp_insert_user( $userdata );
    }

}

}  
else {  
   wp_redirect( home_url() ); exit;  
}
?>

<h2 class="form_title">Inscription</h2>
<form action="" id="registerform" method="post" name="user_registeration">
    <p>
        <label>Identifiant<span class="error">*</span></label>  
        <input type="text" name="username" class="text" required /><br />
    </p>
    <p>
        <label>Adresse e-mail<span class="error">*</span></label>
        <input type="text" name="useremail" class="text" required /> <br />
    </p>
    <p>
        <label>Mot de passe<span class="error">*</span></label>
        <input type="password" name="password" class="text" required /> <br />
    </p>
    <?php if(isset($signUpError)){echo '<div>'.$signUpError.'</div>';} ?>
    <p>
        <input type="submit" name="user_registeration" id="wp-registration"value="Créer votre compte" />
    </p>
</form>

<?php get_footer(); ?>