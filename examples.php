<?
// *********************************************************************
// SOLBOT-PHP EXAMPLES (c) 2021 AIRAD LABS INC.
// VERSION: 0.3 (pre-release)
// This code is licensed under MIT license (see LICENSE.txt for details)
// *********************************************************************

// *********************************************************************
// For development we are allowing the creation of new pods on our dev network. 
// This effectively bypasses the ownership verification of an associated NFT.
// 
// Open the page below in your browser to generate a new pod.
// http://dev.solbots.io/bypass/bypass.php
// 
// The output will contain your new pod address and pod key.
// Copy the output to a notepad!
// Example Output:
// 
// {
//     "status": "success",
//     "message": "Pod Online!",
//     "data": {
//         "token": "b0316c27ef755c1434db35ea9d6da2ed92a50c6f20f61ab5be21a40332ff856e",
//         "mint": "6cce36d9f8a9e151b100234af75cca89d55bcb94c153f51847debdf1f39cae45",
//         "signature": "7a220893a5674a153f1fad576112ad5871a3b1dcb5a22988e6719a74a68fbd8c",
//         "properties": false,
//         "owner": "0bb400349c8a42345b5573c6666bee3efe768712bed2268f5bcd03eaf7a89636",
//         "expires": 1664756091.720955,
//         "pod": "solbot.2UjZXTXVUT2ZMSlFaST06OnAE8yRzVBb3R2UjZXTXVUT2ZMSlFaST06OnAGNShbOz1RvXgegZtwWCE=", // This is the pod address!
//         "user": false,
//         "claimed": 1633220091.720955,
//         "status": "online",
//         "updated": 1633220091.720955,
//         "created": 1633220091.702492,
//         "key": "solbot.1633220091.7210.3c4afb2638dfb2sfb2638d33aab42638dda9dda64be5afb2638dfb2sfb2638d33aab4297" // This is the pod key!
//     }
// }
//
// *********************************************************************

// *********************************************************************
header('Content-Type: application/json');
// *********************************************************************

// *********************************************************************
// import and start solbot (on the dev network)
require("solbot.0.3.php");
// $solbot = new solbot( "dev.solbots.io" , "YOUR_ADDRESS_HERE", "YOUR_KEY_HERE" );
// *********************************************************************

// *********************************************************************
// output the default construct (only use for development)
// $result = $solbot->object();
// $array = json_decode( $result );
// $result = null;
// print_r($array);
// *********************************************************************

// *********************************************************************
// get network details // verifys you have access to the network
// $result = $solbot->info();
// *********************************************************************

// *********************************************************************
// create folders in your pod // a practice folder tree
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
// $result = $solbot->move("folder_1/folder_2/funny_folder");
// *********************************************************************

// *********************************************************************
// copy json file 2
// $result = $solbot->copy("json_2","json");
// *********************************************************************
// copy text file 2
// $result = $solbot->copy("folder_1/txt_2","txt");
// *********************************************************************
// copy folder 2
// $result = $solbot->copy("folder_1/folder_2");
// *********************************************************************

// *********************************************************************
// list folder with options
// $result = $solbot->list("folder_1",array("filter"=>"folders","sort"=>"name","order"=>"asc"));
// *********************************************************************

if(isset($result)){echo $result;}
