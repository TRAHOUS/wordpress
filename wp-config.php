<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordpress1' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'x<tFX[;&_G*IM_,4oD,[VIrcALq/uPaW6tu=)5_$X@I+N/+ W)AOV}XI1w/`;}{T' );
define( 'SECURE_AUTH_KEY',  'AyH(]}#Y]F&eXi)+j()N08E3&94g<a:l$|ZMT(W.I|q8)bzoy>h(Yvv[g <vtk_h' );
define( 'LOGGED_IN_KEY',    ';HshFP670m!I0#z!;9kmtEaY,&|[VR*h!{G9;,jdN9y!^9=.a~Ve>zd:3-hKj8P.' );
define( 'NONCE_KEY',        'h~gd4k}23y*/$4L?cX e^22S45_B{;MXflHi4)n}lI:?VzL6RLqJdk=qg7B[vOXW' );
define( 'AUTH_SALT',        '%k`UFvhMUz69k6+v(K.teD>$h6@E1WD$vk5jX(@@b7~+i:$s{u;uCD))/N$GQ<7F' );
define( 'SECURE_AUTH_SALT', '|&i|~,9kzmARJoxgljR```WKxJm0YK2+?mmE7Y9b/^^rJIzmj@sFs6m(8=qvG&[*' );
define( 'LOGGED_IN_SALT',   '$CJvZ_y+T|31$[9+4=^uTBQ7,3BgqR- mi~_RmA`Kawe10K2av3peX(o_vy&_R-E' );
define( 'NONCE_SALT',       '2l|,_v!AK~}ryEL>~oRbX1c*rA0bCVS0^mu @`3Eb`&gOQ6:~``+ReZOxY377e6x' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
