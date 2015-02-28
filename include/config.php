<?

/* ini_set('session.save_handler', 'files'; */
require_once("dbConnection.php");


session_start();

//connect
include_once("db.conn.php");
include_once("db.class.php");

//function class
/* include_once("class/simple_html_dom.php"); */
/* include_once("class/fc.common.php"); */
/* include_once("push.php"); */


/*****************
**MYSQL Settings**
*****************/
define('DB_HOST', $hostname);
define('DB_USER',$username);
define('DB_PWD',$password);
define('DB_NAME',"kidso");




define('PUSH_ENABLE',1);