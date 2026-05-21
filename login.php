<?php

// Servidor LDAP
$ldap_server = "ldap://localhost";

// Ruta LDAP on es troben els usuaris
$ldap_dn = "ou=people,dc=joaquin,dc=cat";

// Obtenir dades del formulari
$username = $_POST['username'];

$password = $_POST['password'];

// Connexió amb LDAP
$ldap_con = ldap_connect($ldap_server);

// Utilitzar protocol LDAP v3
ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);

// Construcció del DN de l'usuari
$user_dn = "uid=$username,$ldap_dn";

// Intent d'autenticació
if(@ldap_bind($ldap_con, $user_dn, $password)){

    // Login correcte
    header("Location: success.html");

}else{

    // Error d'autenticació
    header("Location: error.html");

}

?>
