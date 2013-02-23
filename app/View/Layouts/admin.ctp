<!DOCTYPE html>
<html>
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
    <title><?php echo $title_for_layout; ?></title> 
    <link rel="stylesheet/less" href="<?php echo $this->Html->url('/css/bootstrap.less'); ?>">
  <?php echo $this->Html->script('less'); ?>
  <?php echo $scripts_for_layout; ?>

  <?php echo $this->Html->charset(); ?>

</head>
<body>


  <div class="topbar"> 
          <div class="topbar-inner"> 
            <div class="container"> 
					<h3><?php echo $this->Html->link('Mots inutiles - Admin', '/'); ?></h3>
              <ul class="nav">
                 <?php if(AuthComponent::user('id')): ?>
                        <li><?php echo $this->Html->link(__("Gestion Mots"), array('controller' => '', 'action' => 'quotes')); ?></li>
                        <li><?php echo $this->Html->link(__("Gestion Users"), array('controller' => 'users', 'action' => 'index')); ?></li>
                        <li><?php echo $this->Html->link(__("Gestion groups"), array('controller' => '', 'action' => 'groups')); ?></li>
                        <li><?php echo $this->Html->link(__("Ajouter un groupe"), array('controller' => 'groups', 'action' => 'add')); ?></li>
                        <li><?php echo $this->Html->link(__("Ajouter un utilisateur"), array('controller' => 'users', 'action' => 'add')); ?></li>
                        <?php else: ?>   
                        <li><?php echo $this->Html->link(__('Se connecter'), array('controller' => 'users', 'action' => 'login')); ?></li>
                        <li><?php echo $this->Html->link("S'inscrire",array('action'=>'add','controller'=>'users')); ?></li>
                <?php endif; ?>
              </ul>
              <ul class="nav secondary-nav">
                <?php if(AuthComponent::user('id')): ?>
                    <li><?php echo $this->Html->link(__('Se déconnecter'), array('controller' => '../users', 'action' => 'logout')); ?></li>
                <?php else: ?> 
                    <li><?php echo $this->Html->link(__('Se connecter'), array('controller' => 'users', 'action' => 'login')); ?></li>
                    <li><?php echo $this->Html->link("S'inscrire",array('action'=>'add','controller'=>'users')); ?></li>
                    <?php endif; ?>
              </ul>



            </div> 
          </div> 
        </div> 
 
 
        <div class="container">
          <?php echo $this->Session->flash(); ?>
          <?php echo $content_for_layout; ?>
        </div> 

       <div class="footer">
          coded with love
        </div>
        

 <!-- <?php echo $this->element('sql_dump'); ?>-->
</body>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
</html>