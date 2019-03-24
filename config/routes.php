<?php
return array(
	
	'libr/log/add' => 'home/addlog',
	'libr/log' => 'home/log',
	
	'libr/books/add' => 'home/addbook',
	'libr/books/edit/([0-9]+)' => 'home/editbook/$1',
	'libr/books/del/([0-9]+)' => 'home/delbook/$1',
	'libr/books/([0-9]+)' => 'home/book/$1',
	'libr/books' => 'home/books',
	
	'libr/authors' => 'home/authors',
	
	'libr/tags' => 'home/tags',
	
	'libr/([-_a-z0-9]+)' => '404',

	);