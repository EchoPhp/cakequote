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
               <?php if(AuthComponent::user('id')): ?>
                  <h3><?php echo $this->Html->link(AuthComponent::user('username'), '/'); ?></h3> 
               <?php else: ?>  
                  <h3><?php echo $this->Html->link('cakequote', '/'); ?></h3> 
               <?php endif; ?>
              <ul class="nav">
                <?php if(AuthComponent::user('id')): ?>
                        <?php if(AuthComponent::user('group_id')==1): ?>
                        <li><?php echo $this->Html->link(__('Espace admin'), array('controller' => 'admin', 'action' => 'users')); ?></li>
                        <?php endif; ?>
                        <li><?php echo $this->Html->link(__('Se déconnecter'), array('controller' => 'users', 'action' => 'logout')); ?></li>
                        <li><?php echo $this->Html->link(__("Ajouter une quote"), array('controller' => 'quotes', 'action' => 'add')); ?></li>
                        <li><?php echo $this->Html->link(__("Voir les utilisateurs"), array('controller' => 'users', 'action' => 'index')); ?></li>
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

       <div id="footer">
          coded with love
        </div>
        

  <!--<?php echo $this->element('sql_dump'); ?>-->
</body>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
</html>