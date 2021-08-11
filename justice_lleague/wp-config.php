<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'lieague' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'lieague' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '91824650' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         './lh>%ib|nfiwh+q2nURT?!$C2Njh`_rWp-(pai3V*c^lME_U,^,bUE`,RA{F,Q}' );
define( 'SECURE_AUTH_KEY',  'FJBIWy5&Q^Vw&Wal(;.EM[Z1O$`4o>!PRm[?qohc=j],D HIUZOAf_19w>/2~Rd9' );
define( 'LOGGED_IN_KEY',    'CDR7r8(<uX.$Tq_@HRJ.e< 7MUN.#7S6`GfhJ$DM0m04?^E!Ag}-3l|;]R{X[cb]' );
define( 'NONCE_KEY',        'zJc2`yVL0U%Z.$g Jm*[n`[Q8Z[/aRY2+YuO/,/3J7M/+J:[bHO=JNV=(qvC$#}j' );
define( 'AUTH_SALT',        'SH<eF~V|]HUjP`w<X9*Mjuov I/iSd![?QA{|(G9~iUgu84nbOR!r3S$nGKFi-%t' );
define( 'SECURE_AUTH_SALT', 'x/<k(::Lf9+{<rzM%vp (174  ;y-UW^x$T6=/Cu0kQ{/4h=8`gtc|7|d0Q<bvWM' );
define( 'LOGGED_IN_SALT',   'tPJKQw*0)+)]uYOo,wch&7!CpJrOy%bM-Kw_VM+ Fj8:pMAZqS{m_3ThN9p?cHNW' );
define( 'NONCE_SALT',       '=M:21U=J#_A*Z!vu~4)Y[$Q!shc{,>=M1E:K{%6cY,+qO o*M3R^PLTEl=R:gcTq' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'lieague_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
