<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $this->fetch('title_for_layout');?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php echo $this->Html->script('Bootstrap./bootstrap/js/bootstrap.min'); ?>
    <!-- Bootstrap -->
	<?php echo $this->Html->css('Bootstrap./bootstrap/css/bootstrap.min'); ?>
	<style>
		body {
			margin-top: 60px;
		}
		
	</style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
		<?php echo $this->fetch('content'); ?>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php echo $this->Html->script('Bootstrap./bootstrap/js/bootstrap.min'); ?>
  </body>
</html>
