<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php echo $this->Html->charset(); ?>
        <title><?php echo $title_for_layout; ?></title>
        <?php
        echo $this->Html->meta( 'icon' );

        // jQuery
        echo $this->Html->script( 'Bootstrap./bootstrap/jquery-2.1.0.min');
        // MaskedInput
        echo $this->Html->script( 'Bootstrap.jquery.inputmask.bundle.min' );
        // HotKeus
        echo $this->Html->script( 'Bootstrap.jquery.hotkeys' );

        // Bootstrap
        echo $this->Html->css( 'Bootstrap./bootstrap/css/bootstrap.min' );
        echo $this->Html->script( 'Bootstrap./bootstrap/js/bootstrap.min' );

        echo $this->fetch( 'meta' );
        echo $this->fetch( 'css' );
        echo $this->fetch( 'script' );

        // AuthBootstrap
        echo $this->Html->css('Bootstrap.authbootstrap.min');
        echo $this->Html->script( 'Bootstrap.authbootstrap' );
        ?>
    </head>
    <body>
        <div class="container">
	        <?php 
    	        if (isset($menus)) {
        	        echo $this->Element( 'Bootstrap.navbar-top-admin' ); 
				}
			?>
            <?php if (isset( $init_password ) ) { ?>
            <div class="alert alert-danger">
                <h4>Senha Inicial para o usuario "bootstrap"</h4>
                <?php echo $init_password; ?>
            </div>
            <?php } ?>
            <?php echo $this->Session->flash( 'flash', array( 'element'=>'Bootstrap.flash' ) ); ?>
       	 	<?php echo $this->fetch( 'content' ); ?>
        </div>
        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>
