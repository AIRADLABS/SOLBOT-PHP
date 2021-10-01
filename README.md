# SOLBOT-PHP

An SDK for interacting with the SOLBOT-API on the solbots.io network.

About SOLBOT-API -> https://github.com/AIRADLABS/SOLBOT-API

SDK Examples -> https://github.com/AIRADLABS/SOLBOT-PHP/blob/main/examples.php

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
