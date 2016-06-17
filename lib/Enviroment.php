<?php


class Enviroment
{

    const ENV_STATE_PRODUCTION = 1;
    const ENV_STATE_DEVELOPMENT = 2;
    const ENV_STATE_LOCAL = 3;
    const ENV_STATE_AUTO = 4;

    /**
     * @config
     * @var array
     */
    private static $localIp=['::1','127.0.0.1'];

    private static $autodiscover {
        get() {
            $cf=new ConfigFile(); 
        }
    }

    /**
     * @config
     * @var int
     */
    public static $state {
        get() {
            if(Enviroment::$autodiscover)
            {
                if(isset($_SERVER['DEVELOPER_DIR']) || !isset($_SERVER['REMOTE_ADDR']) || $_SERVER['REMOTE_ADDR'] == '::1' || $_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == '192.168.200.113' )

            }
        }
    }

    /**
     * @config
     * @var bool if
     */
    public static $forceHost=true;


    /**
     * @config
     * @var bool
     */
    public static $forceSSL=true;
    
    
}