<?php
session_start();
$_PARAM = $_REQUEST;
//connect
include_once("db.conn.php");
include_once("db.class.php");

//function class
include_once("class/html_status_codes.php");
include_once("class/db.common.func.php");

/*
include_once("class/simple_html_dom.php");
include_once("class/fc.common.php");
*/

/*****************
**MYSQL Settings**
*****************/
define('BUILD', "1");
define('SPECIAL', "1");
define('DB_HOST', "localhost");
define('DB_USER',"kidso");
define('DB_PWD','36222784');
define('DB_NAME',"kidso");

define('TABLE_EDITOR_PLUGIN','tb_comment');
define('TABLE_SPECIAL_PLUGIN','tb_comment');
define('TABLE_RECOMMENT_PLUGIN','tb_comment');
define('TABLE_POPULAR_PLUGIN','tb_user');
define('TABLE_USER','tb_user');
define('TABLE_SPECIAL','tb_special');
define('TABLE_BANNER','tb_banner');
define('TABLE_PRODUCTION','tb_product');
define('TABLE_DISTRICT','tb_district');
define('TABLE_CATEGORY','tb_cate');
define('TABLE_FRIEND','tb_friend');
define('TABLE_VOTE','tb_vote');
define('TABLE_COMMENT','tb_comment');
define('TABLE_EDITOR','tb_editor');
define('TABLE_BOOKMARK','tb_bookmark');
?>
