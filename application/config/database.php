<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

// $active_group = 'default';
$active_record = TRUE;

# Server
// $db['mysql']['hostname'] = 'hadits.us';
// $db['mysql']['username'] = 'haditsus_hadits';
// $db['mysql']['password'] = 'kD[Il(gT$N7?';
// $db['mysql']['database'] = 'haditsus_hadits';
// $db['mysql']['dbdriver'] = 'mysql';
// $db['mysql']['dbprefix'] = '';
// $db['mysql']['pconnect'] = TRUE;
// $db['mysql']['db_debug'] = TRUE;
// $db['mysql']['cache_on'] = FALSE;
// $db['mysql']['cachedir'] = '';
// $db['mysql']['char_set'] = 'utf8';
// $db['mysql']['dbcollat'] = 'utf8_general_ci';

# Localhost
$db['mysql']['hostname'] = 'localhost';
$db['mysql']['username'] = 'root';
$db['mysql']['password'] = 'root';
$db['mysql']['database'] = 'hadits';
$db['mysql']['dbdriver'] = 'mysql';
$db['mysql']['dbprefix'] = '';
$db['mysql']['pconnect'] = TRUE;
$db['mysql']['db_debug'] = TRUE;
$db['mysql']['cache_on'] = FALSE;
$db['mysql']['cachedir'] = '';
$db['mysql']['char_set'] = 'utf8';
$db['mysql']['dbcollat'] = 'utf8_general_ci';
$db['mysql']['swap_pre'] = '';


$db['sqlite']['hostname'] = '';
$db['sqlite']['username'] = '';
$db['sqlite']['password'] = '';
$db['sqlite']['database'] = './application/db/hadits1.db';
$db['sqlite']['dbdriver'] = 'sqlite3';
$db['sqlite']['dbprefix'] = '';
$db['sqlite']['pconnect'] = TRUE;
$db['sqlite']['db_debug'] = TRUE;
$db['sqlite']['cache_on'] = FALSE;
$db['sqlite']['cachedir'] = '';
$db['sqlite']['char_set'] = 'utf8';
$db['sqlite']['dbcollat'] = 'utf8_general_ci';
$db['sqlite']['swap_pre'] = '';

$db['sqlite_quran']['hostname'] = '';
$db['sqlite_quran']['username'] = '';
$db['sqlite_quran']['password'] = '';
$db['sqlite_quran']['database'] = './application/db/quran_indo.sqlite';
$db['sqlite_quran']['dbdriver'] = 'sqlite3';
$db['sqlite_quran']['dbprefix'] = '';
$db['sqlite_quran']['pconnect'] = TRUE;
$db['sqlite_quran']['db_debug'] = TRUE;
$db['sqlite_quran']['cache_on'] = FALSE;
$db['sqlite_quran']['cachedir'] = '';
$db['sqlite_quran']['char_set'] = 'utf8';
$db['sqlite_quran']['dbcollat'] = 'utf8_general_ci';
$db['sqlite_quran']['swap_pre'] = '';
// $db['sqlite']['autoinit'] = TRUE;
// $db['sqlite']['stricton'] = FALSE;

//set the default db
// $using_db = 'mysql';
$using_db = 'sqlite_quran';

$active_group = $using_db;
$db[$using_db]['active_group'] = $active_group;

$_SESSION['active_db'] = $active_group;
//use_dbs($active_group);

/* End of file database.php */
/* Location: ./application/config/database.php */
