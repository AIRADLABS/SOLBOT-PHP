<?
////////////////////////////////////////////////////////////////////////
// SOLBOT-PHP (c) 2021 AIRAD LABS INC.
// VRS 0.1
// This code is licensed under MIT license (see LICENSE.txt for details)
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
// solbot class
class solbot {
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
public function __construct() {
$pod_network = "dev.solbots.io";
$pod_address = "solbot.djFEc2JSTEpiVUh5YTVXR2dmQldQUVNzS29lSW56ZWJ1TGlPODQ1Yytmbz06Okny9HMb41f8Sy5O2Kd8bE8=";
$pod_key = "solbot.1632833885.6115.21ca8359d755446e0049f3af777dfa2162d3532960b6e1fd7000e0840df28dfe";
$this->payload->pod_address = $pod_address;
$this->payload->pod_key = $pod_key;
$this->network = $pod_network;
$this->protocol = (!empty($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!=='off'||$_SERVER['SERVER_PORT']==443)?"https://":"http://";
$this->root = $_SERVER['DOCUMENT_ROOT'];
}
////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////
public function send() {
$path = $this->protocol.$this->network;
$ch = curl_init( $path );
if( isset( $this->payload->command ) ) {
$path = $path."/".$this->payload->command;
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
else{
$options = array(CURLOPT_URL=>$path,CURLOPT_RETURNTRANSFER=>true);
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
$this->payload->command = "newPod/YUpoTkJhc3k1N2YxQXJFNTltUTRpWTQvMzFwOUY4cXY1UWZ6Z1ZyRFhtaz06Ok2yyoPGR6ptTzr9wbx9FkE%3D";
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
public function deadbolt( $pod_file="" , $deadbolt=false ) {
if( $deadbolt == false ){
return array("status"=>"error","message"=>"No Deadbolt Supplied!");
}
else{
$this->payload->command = "deadbolt/";
$this->payload->deadbolt = $deadbolt;
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
$this->payload->deadbolt = $deadbolt;
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
}
////////////////////////////////////////////////////////////////////////