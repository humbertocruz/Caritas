<?php
Router::connect(
    '/admin', array(
		'plugin' => 'Admin',
		'controller' => 'Usuarios',
		'action' => 'home'
	)
);
Router::connect(
    '/admin/:controller/:action/*', array('plugin' => 'Admin')
);
Router::connect(
    '/admin/:controller/*', array('plugin' => 'Admin')
);
Router::connect('/login', array('plugin'=>'Admin', 'controller' => 'usuarios', 'action' => 'login'));
Router::connect('/logout', array('plugin'=>'Admin', 'controller' => 'Usuarios', 'action' => 'logout'));