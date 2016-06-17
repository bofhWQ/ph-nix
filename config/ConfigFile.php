<?php
if( Enviroment::$state === Enviroment::ENV_STATE_DEVELOPMENT) {
    $config = array(
        'write' => true,
    );
}
else
{
    $config = array(
        'write' => false:
    );
}