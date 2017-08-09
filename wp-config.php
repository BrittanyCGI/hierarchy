<?php
# Database Configuration
define( 'DB_NAME', 'wp_cgidirectory' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_HOST', 'localhost' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         'OCX?RS>b@(u4;$^.p~[q-)o5*VRStw+,?<O?xR1oh>`;%A:Yl=_Ke+VJ`|gDnLX?');
define('SECURE_AUTH_KEY',  '&oC[WcBax)1uokOIa]nAE|_1R@w%XD&3*.crLCl4|HNx[66m6A~c#Q|QZnVp N|i');
define('LOGGED_IN_KEY',    'vrt:4r$L D2_x<GqYD-lW{||L+e?L&KId}V4-.w$DONzxZIn35$5&x^}ud+=5`lP');
define('NONCE_KEY',        '-m*?%3]NsSBJ8A3HI>XU|AUYMh,Qc52@kZ-rN?rh&&Z[t/U@jkmUbr?3gt.;%hCq');
define('AUTH_SALT',        '@vk9G0<NI;:&Ku4Q%4ch#G+(r88 |K.mN0!D*t:WY@3how|d,nZ>_M3+r.8-|-E|');
define('SECURE_AUTH_SALT', 'f ]PK`9F|D-hQz<Ip=W|J{+3>)3iv^/+wn=oI/xG;<X /s~E/>UU#+<j3:K%()hY');
define('LOGGED_IN_SALT',   '6$w+n<+*c=lh.SQ(#a<GZU.)Azo~RHC7%yHC-GSRcz(T[UIT4gR^6.FwpQ?+#dhc');
define('NONCE_SALT',       '#QrMo[~a`+818:L!N9Rx2,OBR,uch<Spg6@I9rp-#Ni?3p&h+-6<@3$+!U&n-5-V');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'cgidirectory' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', 'd6bb740c1d86a84bb32a2a1145b72c518de03cf2' );

define( 'WPE_CLUSTER_ID', '110946' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'cgidirectory.com', 1 => 'cgidirectory.wpengine.com', 2 => 'www.cgidirectory.com', );

$wpe_varnish_servers=array ( 0 => 'pod-110946', );

$wpe_special_ips=array ( 0 => '104.196.191.214', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
