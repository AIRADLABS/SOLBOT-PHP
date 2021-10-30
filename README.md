# SOLBOT-PHP
![solbots.io](http://dev.solbots.io/assets/img/Crypto-Carl-1920x1080.jpg)

An SDK for interacting with the SOLBOT-API on the solbots.io network.

&nbsp;&nbsp;&bull; About SOLBOT-API: https://github.com/AIRADLABS/SOLBOT-API

The SDK contains one class named solbot that has the following methods.

Methods

<strong>info</strong>

&nbsp;&nbsp;&bull; gets network info

<strong>newFolder</strong>

&nbsp;&nbsp;&bull; creates a new folder

<strong>newFile</strong>

&nbsp;&nbsp;&bull; creates a new file

<strong>read</strong>

&nbsp;&nbsp;&bull; decrypts and reads file

<strong>write</strong>

&nbsp;&nbsp;&bull; encrypts and overwrites any file not deadbolted

<strong>list</strong>

&nbsp;&nbsp;&bull; lists the contents of a folder

<strong>rename</strong>

&nbsp;&nbsp;&bull; renames a folder or file (if not deadbolted)

<strong>move</strong>

&nbsp;&nbsp;&bull; moves a folder or file (if not deadbolted)

<strong>copy</strong>

&nbsp;&nbsp;&bull; makes a copy of a file or folder (appends -COPY)

<strong>deleteFile</strong>

&nbsp;&nbsp;&bull; delete's a file, if it's not a deadbolted json file

<strong>deleteFolder</strong>

&nbsp;&nbsp;&bull; delete's a folder, if it's empty

<strong>deadboltGet</strong>

&nbsp;&nbsp;&bull; generates a random deadbolt (hash)

<strong>deadbolt</strong>

&nbsp;&nbsp;&bull; deadbolts a file

<strong>deadboltRemove</strong>

&nbsp;&nbsp;&bull; removes a deadbolt
