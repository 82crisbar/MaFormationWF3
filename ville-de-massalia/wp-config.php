<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'ville_de_massalia');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'G]ehj2iBomDv$?W`SVwwvIC$H@5<{px4S<{t!.0QN.9<)m>U|T )at7jSO3mS(0i');
define('SECURE_AUTH_KEY',  '&Pi]L7)t7NU3Mc+V*sst{!x~H`!*m 6)[Coib-wE24`?9k~9R{+rfjlgHj`aB{B.');
define('LOGGED_IN_KEY',    '(Mmuu2bTi!Z0^[T2/FZ7.PDEtwM+=E*v9&<|Y.3UwJhNF-}rgFVj&!fGZb/<4!of');
define('NONCE_KEY',        '>K%l06,lT_d9cR?J0v|.`$@Q[?QuuqcMIJ7~ +n<n;=3tDB^s-9,WQQAP#dK,b Y');
define('AUTH_SALT',        '36sos9i*%2q5Xi*%=^jc;b_]a^WML+%hXkR/6iCo,N.M-D8Yb&>5!}eM5DpZi+?!');
define('SECURE_AUTH_SALT', 'pOD>G9%Lm8%4_.U,Pk I0![F`=K/@gLjoN%SB]5e|*PP5s4pnT@U:KG{wkdme^48');
define('LOGGED_IN_SALT',   'Q,uiTfYmESS~d45p<w{SGF.}Y#sUipA<$xI=OKPs@p`DUHMJq>b|Rmax>0w?<Ant');
define('NONCE_SALT',       '_ne0J|ih^<J_RvEv)D4qKeb/1j(<E.s[{Tm<Pv5iQR`[Cw%N!rKb}>6PimuBC]gC');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'xdfs_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');