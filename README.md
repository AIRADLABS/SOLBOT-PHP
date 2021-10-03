# SOLBOT-PHP
![solbots.io](http://dev.solbots.io/assets/img/Crypto-Carl-1920x1080.jpg)

An SDK for interacting with the SOLBOT-API on the solbots.io network.

About SOLBOT-API -> https://github.com/AIRADLABS/SOLBOT-API

This SDK contains one class named solbot that currently supports the following methods:

v0.1+

<strong>send</strong> - used internally

<strong>info</strong> - gets network info

<strong>newPod</strong> - creates a new pod (dev network only)

<strong>newFolder</strong> - creates a new folder

<strong>newFile</strong> - creates a new file

<strong>read</strong> - decrypts and reads any file

<strong>write</strong> - encrypts and overwrites any file not deadbolted

<strong>deadboltGet</strong> - generates a random deadbolt (hash)

<strong>deadbolt</strong> - deadbolts a file

<strong>deadboltRemove</strong> - removes a deadbolt

<strong>list</strong> - lists the contents of a folder

v0.2+

<strong>rename</strong> - renames a folder or file (if not deadbolted)

<strong>move</strong> - moves a folder or file (if not deadbolted)

<strong>copy</strong> - makes a copy of a file or folder (appends -COPY)
