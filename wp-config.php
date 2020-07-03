<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wp-loc' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'f#) v5oNdEfucuTJ=&v@Sy11W4%>yD_K)B44#w/)6!fOq#b9Aa^IQku@Ld[`YP>s' );
define( 'SECURE_AUTH_KEY',  'eYW4Lzjj@|q31[/3NS8+i|{C|`3t@n/YHrx[!ZLla|C@+XAbdDX}3J7Z]FWXC8n*' );
define( 'LOGGED_IN_KEY',    '2^.ISjbIP%TI>_5GhQ&:|CKB&8rR#u-at^K-6l5DC-xH_yfRO}BTF>AHAX -]wZT' );
define( 'NONCE_KEY',        '&SfAU2&v:9JaIvh1r@z*^_7?gYfF/(IN.N@;ilrO>|:N79PIqcRJ|d=LzkI[@]Qq' );
define( 'AUTH_SALT',        '{Mg&zUC$oKv^#Vy{{pzfX= ~.egqs&AU^w88`J!Dg{}FA$qvuNkpIn&cK83J2Ij]' );
define( 'SECURE_AUTH_SALT', '$%D~5vn,YcS|?5#,C5e/UIL8e `$YzNjhDFu)/KR2HYzQ&|q2~X^7nVI2pN54D^W' );
define( 'LOGGED_IN_SALT',   'QI^^8UTZ]+umsI>}Sz=}4q6Q=.]+8#]9AJ)2U4AQQ{FnG:;569WxIj6,H_:+^cC>' );
define( 'NONCE_SALT',       'x5.DMzSmv57SAS:gS-x-Natz|Az<+o_S;NFxKjIz!kIIOgRc!6Gm>9#f+MriJo ,' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
