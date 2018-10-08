<?php

if ( file_exists( __DIR__ . '/local-config.php' ) ) {
	require __DIR__ . '/local-config.php';
}

// ** MySQL settings ** //
//** The name of the database for WordPress */
define('DB_NAME', 'vip');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('AUTH_KEY',         'BOOmVP/oS|ckv{|WYu,5_3]W6oC%ub0Z>o4} Hyeq]TeonMz<C4>P&k,zJm$N!/j');
define('SECURE_AUTH_KEY',  'acPL?GND.?D@|nu79q)7/i)=B2SvI/J(Ny(_.bFviTA,k[!|@c8Y-N/P|#e3 B|F');
define('LOGGED_IN_KEY',    '+S*%!RzJMBo()Zizaw>+m!T]FDE!iPNTy|rIWENQB{%PVA}jr/54.30DO+qHSu~}');
define('NONCE_KEY',        'yE`Wr;b|AK$].&1l,X[I-!p-RsjVEj5Mn>B>c+x<!MT^)YpgabXjxPY@<}^<z[`J');
define('AUTH_SALT',        'Q<^^WU^}i(EG%bN3}aJS*6mQC-`j+l#ei#|-ong4t)xZj{2HCC=UCEx5jgN0&3u8');
define('SECURE_AUTH_SALT', 'rl*<$;I.[t:V=H<R!c*243#:+1+?b]aS|<Qg-0=G+|b`iVQ;3POPEq%fK+0{;NRw');
define('LOGGED_IN_SALT',   '5E G^n;koIBgc@zL}l..!xZexn|6$F;Sz7P50?NgaBiBhfH~g<~zjS?qv* *|+ww');
define('NONCE_SALT',       'Qcq~T+e*#T<Q#K!8@TTG9o+@n|VZNlwjXUC7?:%CNo8EZ~<a08SMsNm}l6Pb|!c*');


$table_prefix = 'wp_';

define('WPLANG', '');

define( 'WP_DEBUG', true );
define( 'SAVEQUERIES', true );
if ( ! defined( 'JETPACK_DEV_DEBUG' ) ) {
define( 'JETPACK_DEV_DEBUG', true );
}
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content' );

define( 'MULTISITE', true );
define( 'SUNRISE', true );
define( 'PATH_CURRENT_SITE', '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );
if ( ! defined( 'DOMAIN_CURRENT_SITE' ) ) {
define( 'DOMAIN_CURRENT_SITE', $_SERVER['HTTP_HOST'] );
}
if ( ! defined( 'SUBDOMAIN_INSTALL' ) ) {
define( 'SUBDOMAIN_INSTALL', false );
}
if ( file_exists( __DIR__ . '/wp-content/plugins/jetpack/class.jetpack-user-agent.php' ) ) {
require_once( __DIR__ . '/wp-content/plugins/jetpack/class.jetpack-user-agent.php' );
} else {
require __DIR__ . '/config/is-mobile.php';
}
require __DIR__ . '/config/batcache-config.php';
require __DIR__ . '/config/roles.php';
require __DIR__ . '/config/vip-config.php';



/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
