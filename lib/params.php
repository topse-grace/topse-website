<?php
/*
* INTER-Mediator Ver.@@@@2@@@@ Released @@@@1@@@@
*
*   Copyright (c) 2010-2015 INTER-Mediator Directive Committee, All rights reserved.
*
*   This project started at the end of 2009 by Masayuki Nii  msyk@msyk.net.
*   INTER-Mediator is supplied under MIT License.
*/

/*
 * common settings for DB_FileMaker_FX and DB_PDO:
 */
$dbUser = 'topse';
$dbPassword = 'seamonkey228443yellow';

/* DB_FileMaker_FX aware below:
 */
$dbServer = '127.0.0.1';
$dbPort = '80';
$dbDataType = 'FMPro12';
$dbDatabase = 'TestDB';
$dbProtocol = 'HTTP';

/* DB_PDO awares below:
 */
$dbDSN = 'mysql:host=localhost;dbname=topse_office;charset=utf8';
//$dbDSN = 'mysql:host=mysql425.db.sakura.ne.jp;dbname=topse_office;charset=utf8';
//$dbDSN = 'mysql:unix_socket=/tmp/mysql.sock;dbname=test_db;charset=utf8mb4';
$dbOption = array();

/* Browser Compatibility Check:
 */
$browserCompatibility = array(
    'Chrome' => '1+',
    'FireFox' => '2+',
    'msie' => '8+',
    'Opera' => '1+',
    'Safari' => '4+',
//    'Safari'=>array('Mac'=>'4+','Win'=>'4+'), // Sample for dividing with OS
    'Trident' => '4+',
    // Trident/4.0(Internet Explorer 8)
    // Trident/5.0(Internet Explorer 9)
    // Trident/6.0(Internet Explorer 10)
    // Trident/7.0(Internet Explorer 11)
    // Before IE 7, 'Trident' token doesn't exist.
);
/*
 * The list of User Agents, it's a wonderful site!
 * http://www.openspc2.org/userAgent/
 */

/* This statement set debug to false forcely. */
$prohibitDebugMode = false;
$prohibitSetCondition = true;
$prohibitSetOrder = true;
$prohibitSetWriteCriticalFields = true;
//$prohibitIgnoreCondition = true;

/*
Command to generate the following RSA key:
$ openssl genrsa -out gen.key 512

*/
$passPhrase = '';
$generatedPrivateKey = <<<EOL
-----BEGIN RSA PRIVATE KEY-----
MIIBOgIBAAJBANcdiiObhDXcQa0SL4MCQCG8almN1gvvYs543xFZkXGYowWjQiUG
jIlwAE/znMB2IWSLBaSVqXmWmjuO3aZ2iy8CAwEAAQJARMMPhiRPFbxrTfxzLYiJ
oX8N68R3+Ga0CdX/UBd2c33FzNS1jl9tY9HBUuPRFCYevWD8NcGNeKudOGinh5Lz
EQIhAPjwWoIMfWtovcXID1uYWXe6A4+E2gblxTLtscS2UuVnAiEA3TeUdjMXGyYo
JsAwKp+GXlKiCHalRPfjRU6yN7fDBvkCIQDz2FyP7zQbtmnOBv4kNsPMp4U9XGFF
SGU2UedETWQ+GQIgEtvRIT57wsm+9Ia/1HJjDxl2TMhokHedfWQXF17oFmkCIAdy
gLmeVGD6H5XvUNVuyAh1g5VZTGuldL8qlQnuOuB8
-----END RSA PRIVATE KEY-----
EOL;

//$httpAccounts = array('user'=>'testtest');
//$httpRedirectURL = "http://10.0.1.226/im/Sample_products/products_MySQL.html";

// in case of $_SERVER['SCRIPT_NAME'] didn't return the valid path.
// These are added before/after the path.
//$scriptPathPrefix = "";
//$scriptPathSuffix = "";

// INTER-Mediator client should call the definition file to work fine.
// Usually $_SERVER['SCRIPT_NAME'] is the url to request from client.
// In case of using INTER-Mediator with other frameworks, you might specify any special URL to call.
// So you can set the another url to the $callURL variables and it can be replaced with $_SERVER['SCRIPT_NAME'].
//$callURL = "http://yourdomai/your/path/to/definition-file.php"

// If you don't set the default timezone in the php.ini file,
//      activate the line below and specify suitable timezone name.
//$defaultTimezone = 'Asia/Tokyo';

// The 'issuedhash' table for storing challenges of authentication can be use another database.
//$issuedHashDSN = 'sqlite:/var/db/im/sample.sq3';

//$emailAsAliasOfUserName = true;

$customLoginPanel = '';

/*
 * If you want to specify the smtp server info, set them below.
$sendMailSMTP = array(
    'server' => 'string',
    'port' => 'integer',
    'username' => 'string',
    'password' => 'string',
);
*/

/*
 * If you want to specify the Pusher information, set them below.
$pusherParameters = array(
    'app_id' => '',
    'key' => '',
    'secret' => '',
);
*/

/* LDAP Support */
$ldapServer = "ldap://136.187.36.77/";
$ldapPort = 389;
$ldapBase = "DC=cb,DC=ecloud,DC=nii,DC=ac,dc=jp";
$ldapContainer = "CN=Users";
$ldapAccountKey = "CN";
$ldapExpiringSeconds = 1800;

$nonSupportMessageId = "nonsupport";