# SOLBOT-PHP
SOLBOT-PHP is an SDK for interacting with the SOLBOT-API.

The SDK contains one class named solbot that currently supports the following methods:

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
