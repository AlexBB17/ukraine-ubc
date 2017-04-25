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
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/ukraineu/ukraine-ubc.kiev.ua/www/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'ukraineu_db');

/** Имя пользователя MySQL */
define('DB_USER', 'ukraineu_db');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'JLE6qZ9q');

/** Имя сервера MySQL */
define('DB_HOST', 'ukraineu.mysql.ukraine.com.ua');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ':Pq.0S}VCy96H}eu^7)T|_B.qNlbtbUMyz|,Q>EQettWEIvY3/^(*G.!0fV%81av');
define('SECURE_AUTH_KEY',  '7rn/G!+E>)qTfaYf[#z)36%3A6t$3;*)q^2hhWi2|>/%L&+B63XuZ$RA.3cVc[DJ');
define('LOGGED_IN_KEY',    'glje:e-S|.Uc LVd+@zL8h+Q4{ve2zmdnPBO9u`[G`!TrwLv;|Y7CqQN8e+_qe!H');
define('NONCE_KEY',        'wCP+04wN0]`k4E-W#hE.X/m^lh,.T>^,H3M.m4C+YufQSqiDg|c?s|(N4Qr+iS,:');
define('AUTH_SALT',        'l[$,3n^__u`O7$#%nCr~&|p$*RGs%KPf(aCO%{1ayY,@ NUl_%;oJfy>pu4@08am');
define('SECURE_AUTH_SALT', 'ivIQ@6+HZFtNsLxS81R=nxa*w`gY~mj`j0*-fs: =diw&vOw0;$H]A#IdBjGw_;2');
define('LOGGED_IN_SALT',   'RlTvMR~7LFu9&7Qf=Bt<@^&X)D|VI18D`>AD81(~sLosVF(-qBzgd !F-Y-/N$Kr');
define('NONCE_SALT',       'e-E%6XM=yoz$xTK:v8&bP|28<-/&Pb]|;2/|IM~I]?X-&Mz;)g4W2LaoZFx,yr|V');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'ubc_';

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
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
