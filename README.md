# SOLBOT-PHP

An SDK for interacting with the SOLBOT-API on the solbots.io network.

About SOLBOT-API -> https://github.com/AIRADLABS/SOLBOT-API

This SDK contains one class named solbot that currently supports the following methods:

v0.1+

send - used internally

info - gets network info

newPod - creates a new pod (dev network only)

newFolder - creates a new folder

newFile - creates a new file

read - decrypts and reads any file

write - encrypts and overwrites any file not deadbolted

deadboltGet - generates a random deadbolt (hash)

deadbolt - deadbolts a file

deadboltRemove - removes a deadbolt

list - lists the contents of a folder

v0.2+

rename - renames a folder or file (if not deadbolted)

move - moves a folder or file (if not deadbolted)

copy - makes a copy of a file or folder (appends -COPY)


Example Usage:
.................................................................................................

header('Content-Type: application/json');

require("solbot.0.2.php");

$solbot = new solbot(

"dev.solbots.io",

"solbot.djFEc2JSTEpiVUh5YTVXR2dmQldQUVNzS29lSW56ZWJ1TGlPODQ1Yytmbz06Okny9HMb41f8Sy5O2Kd8bE8=",

"solbot.1632833885.6115.21ca8359d755446e0049f3af777dfa2162d3532960b6e1fd7000e0840df28dfe"

);

echo $solbot.info();
