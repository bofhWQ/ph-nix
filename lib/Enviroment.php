<?php


class Enviroment extends Base
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
    	$instance=self::getInstance();
    	return $instance->getInternalState();
    }
    
    protected function getInternalState()
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
    			self::debug("Looking for state ",$state);
    			if(is_array($filters))
    			{
    				foreach($filters as $filter)
    				{
    					self::debug("Looking for filter ",$filter);
    					if(isset($filter[0]))
    					{
                            $currentFilter=$filter[0];
                            if(class_exists($currentFilter))
                            {
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
                            else
                            {
                            	self::debug("Filter does not exist",$currentFilter);
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
    	self::debug("Result ",$result);
    	return $result;
    }
}