<?
// *********************************************************************
// SOLBOT-PHP EXAMPLES (c) 2021 AIRAD LABS INC.
// VERSION: 0.2 (pre-release)
// This code is licensed under MIT license (see LICENSE.txt for details)
// *********************************************************************

// *********************************************************************
header('Content-Type: application/json');
// *********************************************************************

// *********************************************************************
// import and start solbot (on the dev network)
require("solbot.0.2.php");
$solbot = new solbot(
"dev.solbots.io",
"solbot.djFEc2JSTEpiVUh5YTVXR2dmQldQUVNzS29lSW56ZWJ1TGlPODQ1Yytmbz06Okny9HMb41f8Sy5O2Kd8bE8=",
"solbot.1632833885.6115.21ca8359d755446e0049f3af777dfa2162d3532960b6e1fd7000e0840df28dfe"
);
// *********************************************************************

// *********************************************************************
// generate new pod on the dev network
// skip this step to use the predefined demo pod address and key
// $result = $solbot->newPod();
// *********************************************************************

// *********************************************************************
// get network info details
// $result = $solbot->info();
// *********************************************************************

// *********************************************************************
// create folders in your pod
// $result = $solbot->newFolder("folder_1");
// $result = $solbot->newFolder("folder_1/folder_2");
// $result = $solbot->newFolder("folder_1/folder_2/folder_3");
// *********************************************************************

// *********************************************************************
// create json files for each folder (for structured data)
// $result = $solbot->newFile("folder_1/json_1");
// $result = $solbot->newFile("folder_1/folder_2/json_2");
// $result = $solbot->newFile("folder_1/folder_2/folder_3/json_3");
// *********************************************************************
// create a txt files for each folder (for non-structured data)
// $result = $solbot->newFile("folder_1/txt_1","txt");
// $result = $solbot->newFile("folder_1/folder_2/txt_2","txt");
// $result = $solbot->newFile("folder_1/folder_2/folder_3/txt_3","txt");
// *********************************************************************

// *********************************************************************
// overwrite json file 1
// $data = new stdClass();
// $data->test = "Hi JSON File 1";
// $result = $solbot->write("folder_1/json_1","json",$data);
// *********************************************************************
// overwrite text file 1
// $data = "Hi TXT File 1";
// $result = $solbot->write("folder_1/txt_1","txt",$data);
// *********************************************************************

// *********************************************************************
// get new deadbolt
// $result = $solbot->deadboltGet();
// *********************************************************************
// deadbolt json file 1
// $result = $solbot->deadbolt("folder_1/json_1","f235b567d010eef2e0075de5be0800a5a5eec63f11936d206c9b35080dc64b1");
// *********************************************************************
// read deadbolted json file 1
// $result = $solbot->read("folder_1/json_1","f235b567d010eef2e0075de5be0800a5a5eec63f11936d206c9b35080dc64b1");
// *********************************************************************
// *********************************************************************
// remove deadbolt
// $result = $solbot->deadboltRemove("folder_1/json_1","f235b567d010eef2e0075de5be0800a5a5eec63f11936d206c9b35080dc64b1");
// *********************************************************************

// *********************************************************************
// read json file 1
// $result = $solbot->read("folder_1/json_1",);
// *********************************************************************
// read txt file 1
// $result = $solbot->read("folder_1/txt_1","txt");
// *********************************************************************
// read json file 1 file and return with the data still encrypted
// $result = $solbot->read("folder_1/json_1",false,true);
// *********************************************************************

// *********************************************************************
// rename json file 3 to "funny_json_3"
// $result = $solbot->rename("folder_1/folder_2/folder_3/json_3","funny_json_3","json");
// *********************************************************************
// rename txt file 3 to "funny_txt_3"
// $result = $solbot->rename("folder_1/folder_2/folder_3/txt_3","funny_txt_3","txt");
// *********************************************************************
// rename folder_3 to "funny_folder"
// $result = $solbot->rename("folder_1/folder_2/folder_3","funny_folder");
// *********************************************************************

// *********************************************************************
// move json file 2 to root
// $result = $solbot->move("folder_1/folder_2/json_2",false,"json");
// *********************************************************************
// move text file 2 to folder 1
// $result = $solbot->move("folder_1/folder_2/txt_2","folder_1","txt");
// *********************************************************************
// move folder_3 to root
// $result = $solbot->move("folder_1/folder_2/folder_3");
// *********************************************************************

// *********************************************************************
// copy json file 1
// $result = $solbot->copy("json_2","json");
// *********************************************************************
// copy text file 2
// $result = $solbot->copy("folder_1/txt_2","txt");
// *********************************************************************
// copy folder 3
// $result = $solbot->copy("folder_3");
// *********************************************************************

// *********************************************************************
// list folder with options
// $result = $solbot->list("folder_1",array("filter"=>"folders","sort"=>"name","order"=>"asc"));
// *********************************************************************

if(isset($result)){echo $result;}
