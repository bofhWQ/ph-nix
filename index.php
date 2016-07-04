<?php
//ToDo: define sollte als Konstante in ein Konfigfile ausgelagert werden!
define('CLASS_DIR', 'lib/');
set_include_path(CLASS_DIR.PATH_SEPARATOR.get_include_path());
spl_autoload_register();
Main::run();
