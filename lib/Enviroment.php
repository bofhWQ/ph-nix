<?php


class Enviroment 
{
 	use Singleton;
 	use DebugTrait;
 		
    /**
     * @config 
     * @var array
     */
    protected static $states = array('auto','dev','prod','local');
    
    /**
     * @config
     * @var String
     */
    public static $state ='auto';
    
    /**
     * @config
     * @var array
     */
    protected static $statefilter=array('dev' => array(array()),'prod' => array(array()));
    
    
    public static function getState()
    {
    	$result='unknown';
    	if(self::$state != 'auto')
    	{
    		$result=self::$state;
    	}
    	else
    	{
    		$found=false;
    		foreach(self::$statefilter as $state => $filters)
    		{
    			if(is_array($filters))
    			{
    				foreach($filters as $filter)
    				{

    					if(isset($filter[0]))
    					{
                            $currentFilter=$filter[0];
    						$args=null;
    						if(isset($filter[1]))
    						{
    							$args=$filter[1];
    						}
    						if($currentFilter::is($args))
    						{
    							$result=$state;
    							$found=true;
    							break;
    						}
    					}
    				}
    				if($found)
    				{
    					break;
    				}
    			}
    		}
    	}
    	echo "Result ".$result;
    	return $result;
    }
    
    
}