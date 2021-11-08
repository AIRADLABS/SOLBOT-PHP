<?
// *********************************************************************
// SOLBOT-PHP EXAMPLES (c) 2021 AIRAD LABS INC.
// VERSION: 0.6 (pre-release)
// This code is licensed under MIT license (see LICENSE.txt for details)
// *********************************************************************

// *********************************************************************
header('Content-Type: application/json');
// *********************************************************************

// *********************************************************************
// import and start solbot (on the dev network)
require("solbot.0.6.php");
// $solbot = new solbot( "dev.solbots.io" , "YOUR_ADDRESS_HERE", "YOUR_KEY_HERE" );
$solbot = new solbot( 
  "dev.solbots.io" , 
  "solbot.alVVMTJuL1NPNG4wbFp3VFIvWEhqTEp0K3NPOGQ5dEwvYWwxdi9ibnM2ST06OrTNNmD02aNZWJJli3wPzJQ=", 
  "solbot.1633256067.5683.586239f20c85bf72f749ae73323b9113afb284757b91d3bc0bee4be3bb2c42c9" );
// *********************************************************************

// you can run this file in your browser to test examples after you install it on your server
// https://yoursite.com/path-to-the-file/examples.php 
// uncomment any command below and refresh the page to test it

// info
// *********************************************************************
// get network details // verifys you have access to the network
$result = $solbot->info();
// *********************************************************************

// newFolder
// *********************************************************************
// create folders in your pod // a practice folder tree
// $result = $solbot->newFolder("folder_1");
// $result = $solbot->newFolder("folder_1/folder_2");
// $result = $solbot->newFolder("folder_1/folder_2/folder_3");
// *********************************************************************

// newFile
// *********************************************************************
// create json files for each folder (for structured data)
// $result = $solbot->newFile("folder_1/json_1","json");
// $result = $solbot->newFile("folder_1/folder_2/json_2","json");
// $result = $solbot->newFile("folder_1/folder_2/folder_3/json_3","json");
// *********************************************************************
// create a txt files for each folder (for non-structured data)
// $result = $solbot->newFile("folder_1/txt_1","txt");
// $result = $solbot->newFile("folder_1/folder_2/txt_2","txt");
// $result = $solbot->newFile("folder_1/folder_2/folder_3/txt_3","txt");
// *********************************************************************

// write
// *********************************************************************
// overwrite json file 1
// $data = new stdClass();
// $data->test = "New JSON File!";
// $result = $solbot->write("folder_1/testme",false,$data);
// *********************************************************************
// overwrite text file 1
// $data = "New TXT File!";
// $result = $solbot->write("folder_1/txt_1","txt",$data);
// *********************************************************************

// append
// *********************************************************************
// append a new line of data to a text file
// $result = $solbot->append("folder_1/txt_1",txt,"New Appended Text!")
// *********************************************************************

// read
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

// rename
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

// move
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

// copy
// *********************************************************************
// copy json file 2
// $result = $solbot->copy("my_pod_file","json");
// *********************************************************************
// copy text file 2
// $result = $solbot->copy("folder_1/txt_2","txt");
// *********************************************************************
// copy folder 2
// $result = $solbot->copy("folder_1/folder_2");
// *********************************************************************

// list
// *********************************************************************
// list folder with options
// $result = $solbot->list("folder_1",array("filter"=>"folders","sort"=>"name","order"=>"asc"));
// *********************************************************************

// deleteFile
// *********************************************************************
// deletes a json file, if its not deadbolted
// $result = $solbot->deleteFile("folder_1/folder_2/my_pod_file");
// delete a txt file
// $result = $solbot->deleteFile("folder_1/txt_2", "txt");
// *********************************************************************

// deleteFolder
// *********************************************************************
// deletes a folder, if its empty
// $result = $solbot->deleteFolder("folder_1/folder_2/folder_3");
// *********************************************************************

// *********************************************************************
// DEADBOLTING
// *********************************************************************
// deadboltGet
// generates a new random deadbolt
// $result = $solbot->deadboltGet();
// *********************************************************************
// deadbolt
// deadbolts a json file
// $result = $solbot->deadbolt("folder_1/json_1","f235b567d010eef2e0075de5be0800a5a5eec63f11936d206c9b35080dc64b1");
// *********************************************************************
// read (with deadbolt)
// read a deadbolted json file
// $result = $solbot->read("folder_1/json_1","f235b567d010eef2e0075de5be0800a5a5eec63f11936d206c9b35080dc64b1");
// *********************************************************************
// deadboltRemove
// removes a deadbolt from a json file
// $result = $solbot->deadboltRemove("folder_1/json_1","f235b567d010eef2e0075de5be0800a5a5eec63f11936d206c9b35080dc64b1");
// *********************************************************************


if(isset($result)){echo $result;}
