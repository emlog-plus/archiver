<?php
function callback_init(){
	global $CACHE;
	$DB = Database::getInstance();
	$inDB = $DB->query("SELECT 1 FROM ".DB_PREFIX."navi WHERE url='".BLOG_URL."?plugin=archiver-master'");
	if (!$DB->num_rows($inDB)) {
		$DB->query("INSERT INTO ".DB_PREFIX."navi (naviname, url, newtab, hide, taxis, isdefault) VALUES('归档', '".BLOG_URL."?plugin=archiver-master', 'n', 'n', 1, 'n')");
	} else {
		$DB->query("UPDATE ".DB_PREFIX."navi SET hide='n' WHERE url='".BLOG_URL."?plugin=archiver-master'");
	}
	$CACHE->updateCache('navi');
}

function callback_rm(){
	global $CACHE;
	$DB = Database::getInstance();
	$DB->query("UPDATE ".DB_PREFIX."navi SET hide='y' WHERE url='".BLOG_URL."?plugin=archiver-master'");
	$CACHE->updateCache('navi');
}

?>