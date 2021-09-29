# SOLBOT-PHP
SOLBOT-PHP is an SDK for interacting with the SOLBOT-API.

EXAMPLE USAGE

start solbot

$solbot = new solbot();

get network info

$result = $solbot->info();

generate newpod on the dev network

$result = $solbot->newPod();

create a new folder in your pod

$result = $solbot->newFolder("testFolder_1");

create a new json file (structured data)

$result = $solbot->newFile("testFolder_1/testFile_1");

create a new txt file

$result = $solbot->newFile("testFolder_1/testFile_1","txt");

read a file

$result = $solbot->read("testFolder_1/testFile_1");

read a txt file

$result = $solbot->read("testFolder_1/testFile_1");

write json file

$data = new stdClass();

$data->yourprop = "Your Stuff";

$data->yourotherprop = "More Things";

$result = $solbot->write("testFolder_1/testFile_1","json",$data);

get a new deadbolt

$result = $solbot->deadboltGet();

deadbolt a file

$deadbolt = $solbot->deadboltGet();

$result = $solbot->deadbolt("testFolder_1/testFile_1",$deadbolt);

remove a deadbolt

$result = $solbot->deadboltRemove("testFolder_1/testFile_1",$deadbolt);

list folder contents

$result = $solbot->list("testFolder_1");
