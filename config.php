<?php
if( !defined("TEMPO_MAIN_PROGRAM") ) die( "Error: can't include this file directly" );

define( "TEMPO_DB_HOST", getenv("DB_HOST") );
define( "TEMPO_DB_NAME", getenv("DB_NAME") );
define( "TEMPO_DB_USER", getenv("DB_USER") );
define( "TEMPO_DB_PASS", getenv("DB_PASS") );

// no trailing slash
define( "TEMPO_URL", getenv('TEMPO_URL') );
define( "TEMPO_SALT", getenv('SALT') );
