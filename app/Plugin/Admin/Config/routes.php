<?php
	Router::connect('/login', array('plugin' => 'Admin', 'controller' => 'Atendentes', 'action' => 'login'));
	Router::connect('/logout', array('plugin' => 'Admin', 'controller' => 'Atendentes', 'action' => 'logout'));
	