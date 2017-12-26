<?php if ($page_head!='raw'): ?>
	
  		<?php echo $this->render('header.htm',NULL,get_defined_vars(),0); ?>
		<?php if ($page_head!='form'): ?>
  		  	<?php echo $this->render('nav.htm',NULL,get_defined_vars(),0); ?>
		<?php endif; ?>
		<?php echo $this->render($view,NULL,get_defined_vars(),0); ?>
		<?php echo $this->render('footer.htm',NULL,get_defined_vars(),0); ?>
	
	<?php else: ?>
	  	<?php echo $this->render($view,NULL,get_defined_vars(),0); ?>
	
<?php endif; ?>
