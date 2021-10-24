<?
////////////////////////////////////////////////////////////////////////
// SOLBOT-PHP: (c) 2021 AIRAD LABS INC.
// VERSION: 0.5 (pre-release)
// This code is licensed under MIT license (see LICENSE.txt for details)
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
// solbot class
class solbot {
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
// initial object construct after instantiation
public function __construct( $pod_network , $pod_address , $pod_key ) {
$this->protocol = (!empty($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!=='off'
||$_SERVER['SERVER_PORT']==443)?"https://":"http://";
$this->network = $pod_network;
$this->version = "0.5";
if(!isset($this->payload)){
$this->payload = new stdClass;
}
$this->payload->pod_address = $pod_address;
$this->payload->pod_key = $pod_key;
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
// dev only // remove before live deployment
public function object() {
return json_encode( $this );  
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
// curl post // used by each method to send the payload to the network
public function send() {
$path = $this->protocol.$this->network;
$ch = curl_init( $path );
if( isset( $this->payload->command ) ) {
$path = $path."/".$this->payload->command.str_replace(".","-",$this->version)."/";
$data = json_encode( $this->payload );
$data = array( "payload" => $data );
$data = http_build_query( $data );
$options = array( 
  CURLOPT_URL => $path , 
  CURLOPT_RETURNTRANSFER => true ,
  CURLOPT_HTTPHEADER => array('Content-Type:application/x-www-form-urlencoded','Content-Length:'.strlen( $data ) ), 
  CURLOPT_POST => 1 , 
  CURLOPT_POSTFIELDS => $data 
);
}
curl_setopt_array( $ch , $options );
$result = curl_exec( $ch );
curl_close( $ch );
//return stripslashes($result);
return $result;
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
// returns details about the network you're currently connected to
public function info() {
$this->payload->command = "info/";
return $this->send();
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
// creates a new folder
public function newFolder( $pod_folder="" ) {
$this->payload->command = "newFolder/";
$this->payload->pod_folder = $pod_folder;
return $this->send();
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
// creates a new json or txt file // json by default
public function newFile( $pod_file="" , $pod_format=false ) {
$this->payload->command = "newFile/";
$this->payload->pod_file = $pod_file;
$this->payload->pod_format = $pod_format;
return $this->send();
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
// reads a file // pass $decrypt false to return encrypted data
public function read( $pod_file="" , $format=false , $decrypt=true ) {
$this->payload->command = "read/";
$this->payload->pod_file = $pod_file;
if( $format == "json" or $format == "txt" ){
$this->payload->pod_format = $format;
}
elseif( $format !== false ){
$this->payload->pod_deadbolt = $format;
}
if( $decrypt == false ){
$this->payload->pod_decrypt = false;
}
return $this->send();
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
// overwrites the contents of a file // false = json or specify txt
public function write( $pod_file="" , $pod_format=false , $pod_data ) {
$this->payload->command = "write/";
$this->payload->pod_file = $pod_file;
$this->payload->pod_format = $pod_format;
$this->payload->pod_data = $pod_data;
return $this->send();
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
// lists the contents of a folder // defaults to root
public function list( $pod_folder=false , $options=false ) {
$this->payload->command = "list/";
if( $pod_folder !== "root" and $pod_folder !== false ) {
$this->payload->pod_folder = $pod_folder;
}
if( $options !== false and is_array( $options ) ) {
  foreach( $options as $key => $val ){
    if( $key == "filter" ){
      $this->payload->pod_filter = $val;
    }
    elseif( $key == "format" ){
      $this->payload->pod_format = $val;
    }
    elseif( $key == "sort" ){
      $this->payload->pod_sort = $val;
    }
    elseif( $key == "order" ){
      $this->payload->pod_order = $val;
    }
  }
}
return $this->send();
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
// renames a folder // or any txt or json file if a format is specified
public function rename( $renamefrom=false , $renameto=false , $format=false ) {
$this->payload->command = "rename/";

if( $renamefrom == false or $renameto == false ){
$result = array( "status" => "error" , "message" => "No filename provided!" );
}
else{
$this->payload->pod_renamefrom = $renamefrom;
$this->payload->pod_renameto = $renameto;
}

if( $format == "json" ){
$this->payload->pod_format = $format;
}
elseif( $format == "txt" ){
$this->payload->pod_format = $format;
}

return $this->send();

if( isset( $result["status"] ) ){
//return $result;
}
else{
//return $this->send();
}



}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
// copies a folder // or any txt or json file if a format is specified
public function copy( $pod_path=false , $pod_format=false ) {

$this->payload->command = "copy/";

if( $pod_path == false ){
$result = array( "status" => "error" , "message" => "No file or folder specified!" );
}
else{
$this->payload->pod_path = $pod_path;
}

if( $pod_format == "json" ){
$this->payload->pod_format = $pod_format;
}
elseif( $pod_format == "txt" ){
$this->payload->pod_format = $pod_format;
}

if( isset( $result["status"] ) ){
return $result;
}else{
return $this->send();
}

}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
// moves a folder // or any txt or json file if a format is specified
public function move( $movefrom=false , $moveto=false , $format=false ) {
$this->payload->command = "move/";

if( $movefrom == false ){
$result = array( "status" => "error" , "message" => "No filename provided!" );
}
else{
$this->payload->pod_movefrom = $movefrom;
}

if( $movefrom !== false ){
$this->payload->pod_moveto = $moveto;
}

if( $format == "json" ){
$this->payload->pod_format = $format;
}
elseif( $format == "txt" ){
$this->payload->pod_format = $format;
}

if( isset( $result["status"] ) ){
return $result;
}
else{
return $this->send();
}

}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
// delete a file, if not deadbolted
public function deleteFile( $pod_file=false , $format=false ) {
$this->payload->command = "deleteFile/";
$this->payload->pod_file = $pod_file;
if( $format == "json" or $format == "txt" ){
$this->payload->pod_format = $format;
}
return $this->send();
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
// delete a folder, if it's empty
public function deleteFolder( $pod_folder=false ) {
$this->payload->command = "deleteFolder/";
$this->payload->pod_folder = $pod_folder;
return $this->send();
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
// returns a randomaly generated deadbolt for deadbolting json files
public function deadboltGet() {
$this->payload->command = "deadboltGet/";
return $this->send();
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
// deadbolts a json file // file will be read and copy only
public function deadbolt( $pod_file=false , $pod_deadbolt=false ) {
if( $pod_deadbolt == false ){
return array("status"=>"error","message"=>"No Deadbolt Supplied!");
}
elseif( $pod_file == false ){
return array("status"=>"error","message"=>"No File Supplied!");
}
else{
$this->payload->command = "deadbolt/";
$this->payload->pod_deadbolt = $pod_deadbolt;
$this->payload->pod_file = $pod_file;
return $this->send();
}
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
// removes a deadbolt from a json file
// WARNING! 
// providing the wrong deadbolt key will brick the file 
// this provides tamper proof security, but makes it delicate
// to be safe, consider the following flow
// 1. copy the file first 
// 2. remove deadbolt from original
// 3. read the origianl
// 4. delete the copy if original is legible
public function deadboltRemove( $pod_file="" , $deadbolt=false ) {
if( $deadbolt == false ){
return array("status"=>"error","message"=>"No Deadbolt Supplied!");
}
else{
$this->payload->command = "deadboltRemove/";
$this->payload->pod_deadbolt = $deadbolt;
$this->payload->pod_file = $pod_file;
return $this->send();
}
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
}
////////////////////////////////////////////////////////////////////////
