<?
////////////////////////////////////////////////////////////////////////
// SOLBOT-PHP: (c) 2021 AIRAD LABS INC.
// VERSION: 0.2 (pre-release)
// This code is licensed under MIT license (see LICENSE.txt for details)
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
// solbot class
class solbot {
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
public function __construct( $pod_network , $pod_address , $pod_key ) {
$this->network = $pod_network;
$this->version = "0.2";
if(!isset($this->payload)){
$this->payload = new stdClass;
}
$this->payload->pod_address = $pod_address;
$this->payload->pod_key = $pod_key;
$this->protocol = (!empty($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!=='off'||$_SERVER['SERVER_PORT']==443)?"https://":"http://";
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
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
//if( isset( $this->payload ) ) { unset( $this->payload ) };
curl_close( $ch );
//return json_decode( $result , true );
return $result;
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
public function info() {
$this->payload->command = "info/";
return $this->send();
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
public function newPod() {
$this->payload->command = "newPod/";
return $this->send();
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
public function newFolder( $pod_folder="" ) {
$this->payload->command = "newFolder/";
$this->payload->pod_folder = $pod_folder;
return $this->send();
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
public function newFile( $pod_file="" , $pod_format="json" ) {
$this->payload->command = "newFile/";
$this->payload->pod_file = $pod_file;
$this->payload->pod_format = $pod_format;
return $this->send();
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
public function read( $pod_file="" , $option=false , $decrypt=false ) {
$this->payload->command = "read/";
$this->payload->pod_file = $pod_file;
if( $option == "json" or $option == "txt" ){
$this->payload->pod_format = $option;
}
elseif( $option !== false ){
$this->payload->pod_deadbolt = $option;
}
if( $decrypt == true ){
$this->payload->pod_decrypt = false;
}
return $this->send();
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
public function write( $pod_file="" , $pod_format="json" , $pod_data ) {
$this->payload->command = "write/";
$this->payload->pod_file = $pod_file;
$this->payload->pod_format = $pod_format;
$this->payload->pod_data = $pod_data;
return $this->send();
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
public function deadboltGet() {
$this->payload->command = "deadboltGet/";
return $this->send();
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
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
public function rename( $renamefrom=false , $renameto=false, $format=false ) {
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
public function move( $movefrom=false , $moveto=false, $format=false ) {
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
}
////////////////////////////////////////////////////////////////////////
