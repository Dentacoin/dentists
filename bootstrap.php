<?php

// define short code for DIRECTORY_SEPARATOR
define('DS', '/');
// define base directory for project
define('ROOT', realpath(dirname(__FILE__)) . DS);
// define uploads directory
define('BASE_URL', 'https://dentists.dentacoin.com/');
define('UPLOADS', ROOT . 'public' . DS . 'assets' . DS . 'uploads' . DS);
define('UPLOADS_FRONT_END', DS . 'assets' . DS . 'uploads' . DS);
define('MAX_UPL_SIZE', 2097152);


define('EMAIL_SENDER', 'ids@dentacoin.com');