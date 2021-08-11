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
define( 'DB_NAME', 'brumarquezine' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'brumarquezine' );

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
define( 'AUTH_KEY',         ' JMbKi )~[ycV2DD>[]8!*< yBC`3MV9u<(#61MVI&,M`Yj(q^DZ$dc}jz]8!*UQ' );
define( 'SECURE_AUTH_KEY',  'IoeG/BAG(@Pp@o=hjuCBE<>s6^My@o=)U<|.K!Vo8}Ya</zs%]J$GgnBE1d/a(Wb' );
define( 'LOGGED_IN_KEY',    'lVr!Xb:%lg2Y<m(T}~_[dwoe]!MaUx>F;#z@;1KxI+ZYcOu:(4D]>3vT;{+ME+}B' );
define( 'NONCE_KEY',        'Os@]B3o2+{ZT@A8C).#ADEZ@YnKKL%5Az&=H$+6?sz?]nU)bP^.xVW-p.;{9f@CG' );
define( 'AUTH_SALT',        'YSZs0nsi@}>CXIUI,5~t]L$<pP`S^;h[3tXT#(8~Wk=&8+k,]vPfN1Naojqi^;}D' );
define( 'SECURE_AUTH_SALT', 'lV^|,$mcN(7=zaK4nIlcm!uCX+l]gL1hPz+/u- kl~U$ <:SqX2BUMzW)x7wdX=Q' );
define( 'LOGGED_IN_SALT',   'bOP-gaQAFHT&DN~9!=K5-G2~P<ljD;DcKnAnL/G7Q.+u=v/i54+3zWI}{qaLkS(]' );
define( 'NONCE_SALT',       '&H?PK#j%B%VfuSXjun mvi:@gqI]xKG}Fo*KH~d7OMSY/Y[`ofe]j:s  O5?GzFr' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'bruna_';

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
