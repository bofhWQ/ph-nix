<?php
$config=array (
  'states' => array (
    0 => 'auto',
    1 => 'dev',
    2 => 'prod',
    3 => 'local',
  ),
  'state' => 'auto',
  'statefilter' => array (
    'prod' => array (
      		0 => array('IPFilter','144.76.31.149'),
      		1 => array('HostFilter','www'),
    ),
  	'dev' => array (
  				0 => array('IPFilter','144.76.31.150'),
  				1 => array('HostFilter','dev'),
  	),
  	'local' => array (
  	  0 => array ('IPFilter','127.0.0'),
  	  1 => array ('IPFilter','::1'),
  	  2 => array ('IPFilter','192.168'),
  	),
  ),
);