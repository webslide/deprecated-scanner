<?php
/*********************************
 * @Author  WebSlide Studio
 * @Site    http://www.webslide.hu 
 * @Date    2012-11-05
 * @Version 1.0.0
 *  
 * Open source project
 ********************************/
 
 
 
 
/**
 * Define the directory.
 * This script will check all php file in this folder
 * and this folder's subfolders.
 * 	 
 * This script won't check itself!
 * 	 
 * 	 	 
 * Value example: 	 	 
 * define('DIRPATH','../');
 * define('DIRPATH','../project');
 * define('DIRPATH','/home/user/test.com/');
 * define('DIRPATH','test/');	 	 	 	 
 */
	 
define('DIRPATH','../');





/**
 * Deprecated functions.
 * Function => Error string 
 */
 
$deprecated_functions = array
(
	'session_register' => 'Session_register is deprecated!',
	'session_unregister' => 'Session_unregister is deprecated!',
	'session_is_registered' => 'Session_is_registered is deprecated!',
	'ereg' => 'Ereg is deprecated! Please use preg_match()!',
	'call_user_method' => 'Call_user_method() is deprecated! Use call_user_func() instead',
	'call_user_method_array' => 'Call_user_method_array() is deprecated! Use call_user_func_array() instead',
	'define_syslog_variables' => 'Define_syslog_variables() is deprecated!',
	'dl' => 'dl() is deprecated!',
	'ereg' => 'Ereg() is deprecated! Use preg_match() instead',
	'ereg_replace' => 'Ereg_replace() is deprecated! Use preg_replace() instead',
	'eregi' => 'Eregi() is deprecated! Use preg_match() with the \'i\' modifier instead',
	'eregi_replace' => 'Eregi_replace() is deprecated! Use preg_replace() with the \'i\' modifier instead',
	'set_magic_quotes_runtime' => 'Set_magic_quotes_runtime() is deprecated!',
	'magic_quotes_runtime' => 'Magic_quotes_runtime is deprecated!',
	'set_socket_blocking' => 'Set_socket_blocking() is deprecated! Use stream_set_blocking() instead',
	'split' => 'Split() is deprecated! Use preg_split() instead',
	'spliti' => 'Spliti() is deprecated! Use preg_split() with the \'i\' modifier instead',
	'sql_regcase' => 'Sql_regcase() is deprecated!',
	'mysql_db_query' => 'Mysql_* is deprecated! Please use PDO or MySQLi', 
	'mysql_query' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_select_db' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_fetch_array' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_fetch_assoc' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_affected_rows' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_client_encoding' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_close' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_connect' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_create_db' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_data_see' => 'Mysql_* is deprecated! Please use PDO or MySQLi',                                                        
	'mysql_db_name' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_db_query' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_drop_db' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_errno' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_error' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_escape_string' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_fetch_array' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_fetch_assoc' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_fetch_field' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_fetch_lengths' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_fetch_object' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_fetch_row' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_field_flags' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_field_len' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_field_name' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_field_seek' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_field_table' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_field_type' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_free_result' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_get_client_info' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_get_host_info' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_get_proto_info' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_get_server_info' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_info' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_insert_id' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_list_dbs' => 'Mysql_* is deprecated! This function is deprecated in php 5.4! Please use PDO or MySQLi',
	'mysql_list_fields' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_list_processes' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_list_tables' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_num_fields' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_num_rows' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_pconnect' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_ping' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_query' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_real_escape_string' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_result' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_select_db' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_set_charset' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_stat' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_tablename' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_thread_id' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mysql_unbuffered_query' => 'Mysql_* is deprecated! Please use PDO or MySQLi',
	'mcrypt_generic_end()' => 'mcrypt_generic_end() is deprecated in php 5.4.x!',
			
);
