wikigeektool
============

PHP scripts that output the title and plain text from the Wikipedia (English) Featured Article of the day (for the current day).  The scripts strip out wiki links and just displays the text.

You can use them with GeekTool to get random facts delivered to your desktop daily.  GeekTool is available for free in the Mac App Store.

Requirements:

* Geek Tool installed: https://itunes.apple.com/us/app/geektool/id456877552?mt=12
* PHP installed: Built and tested with PHP 5.3.15, but the exact version should not matter too much.

Installation notes:

Set up two Shell scripts in Geek Tool, one for wikititle.php and one for wikitext.php (examples below, be mindful of the path and try in terminal first so you can be sure you get the texts.).  It's only one article a day, so you can set the interval to 86400 seconds.

php ~/wikigeektool/wiktitle.php
php ~/wikigeektool/wikitext.php

Then, arrange the text however you want.
