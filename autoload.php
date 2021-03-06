<?php
session_start();
$project_folder = '';
$development_env = false;
error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_SERVER['HTTP_HOST'] == '127.0.0.1' or $_SERVER['HTTP_HOST'] == 'localhost' or strpos($_SERVER['HTTP_HOST'], "192.168") !== false)
{
	$development_env = true;
}
if($development_env == true)
{
    $project_folder = '/sidiscam';
}

define("main_folder",$project_folder);//Project name and directory name//prueba 2
define("title","SISTEMA DE GESTIÓN COMERCIAL - SIGECOM");
define("Author","Marcos De Andrade");
define("Company","Compañia de Desarrollo");
define("version","V1.0");
define("development_by","Compañia de Desarrollo");
define("upload_temp_dir",$_SERVER["DOCUMENT_ROOT"]."/".main_folder."/web/uploads/temp");
define("upload_dir",$_SERVER["DOCUMENT_ROOT"]."/".main_folder."/web/uploads/documentos");
define("images_dir","../../../../web/images/");

/* configuraciones apache*/
$base_dir  = __DIR__; // Absolute path to your installation, ex: /var/www/mywebsite
$doc_root  = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']); # ex: /var/www
$base_url  = preg_replace("!^${doc_root}!", '', $base_dir); # ex: '' or '/mywebsite'
$protocol  = empty($_SERVER['HTTPS']) ? 'http' : 'https';
$port      = $_SERVER['SERVER_PORT'];
$disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";
$domain    = $_SERVER['SERVER_NAME'].$project_folder;
$full_url  = "${protocol}://${domain}";

define("base_dir",__DIR__);// Absolute path to your installation, ex: /var/www/mywebsite
define("doc_root", preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']).$project_folder);// ex: /var/www
define("base_url",preg_replace("!^${doc_root}!", '', $base_dir));# ex: '' or '/mywebsite'
define("protocol",empty($_SERVER['HTTPS']) ? 'http' : 'https');
define("port",$_SERVER['SERVER_PORT']);
define("disp_port",($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port");
define("domain",$_SERVER['SERVER_NAME'].$project_folder);
define("full_url",protocol."://".domain);
define("image_url",full_url."/web/images/");

/*
 * 
 * You can add more constants
 * 
 * 
 * */
 define('mail_from',"noreply@frbcomputersgroup.com.ve");
 define('message_updated',"Registro actualizado satisfactoriamente");
 define('message_created',"Registro creado satisfactoriamente");
  define('max_list_text',"30");

//Class definition
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/notorm-master/NotORM.php");//se debe incluir una sola vez en todo el cms
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/ConnectionORM.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/vendors/swiftmailer/lib/swift_required.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/vendors/tcpdf/tcpdf.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/changer.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/ValidateBase.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/SecurityBase.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/Utilitarios.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/Menu.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/RegistroModel.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/CarousselDetails.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/Mail.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/Farms.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/Containers.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/Message.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/Users.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/Company.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/UsersCompany.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/Country.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/ShippingLines.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/Products.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/ProductsType.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/Regions.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/Ports.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/Bank.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/Clients.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/Plants.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/Incoterms.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/Brokers.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/BanksTablesId.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/Tables.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/States.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/TypeDestiny.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/Sales.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/SalesProductsDetail.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/SalesPlantsDetail.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/SalesFarmsDetail.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/SalesContainersDetail.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/ClientsBanksDetail.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/ClientsAddressDetail.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/CompanyBanksDetail.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/CompanyAddressDetail.class.php");

include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/PlantsBanksDetail.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/BrokersBanksDetail.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/FarmsBanksDetail.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/InvoicesPDF.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/ConnectionsHistory.class.php");
include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/Reporte1.class.php");

require($_SERVER["DOCUMENT_ROOT"]."/".main_folder.'/lib/vendors/securimage/securimage.php');
/*validation class*/
//include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/vendor/GUMP/gump.class.php");

/***
 Class autoloads by model_base_generator.php
**/
//include($_SERVER["DOCUMENT_ROOT"]."/".main_folder."/lib/model/Users.class.php");

