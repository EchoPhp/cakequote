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
                  <h3><?php echo $this->Html->link('Mots inutiles - '.AuthComponent::user('username'), '/'); ?></h3> 
               <?php else: ?>  
                  <h3><?php echo $this->Html->link('Mots inutiles', '/'); ?></h3> 
               <?php endif; ?>
              <ul class="nav">
                <?php if(AuthComponent::user('id')): ?>
                        <li><?php echo $this->Html->link(__("Ajouter un mot"), array('controller' => 'quotes', 'action' => 'add')); ?></li>
                        <li><?php echo $this->Html->link(__("Mon profil"), array('controller' => 'users', 'action' => 'view/'.AuthComponent::user('id'))); ?></li>
                        <li><?php echo $this->Html->link(__("Voir les utilisateurs"), array('controller' => 'users', 'action' => 'index')); ?></li>
                <?php endif; ?>
                        <li><?php echo $this->Html->link(__('Mot au hasard'), array('controller' => 'quotes', 'action' => 'random')); ?></li>
              </ul>
              <ul class="nav secondary-nav">
                <?php if(AuthComponent::user('id')): ?>
                    <li><?php echo $this->Html->link(__('Se déconnecter'), array('controller' => 'users', 'action' => 'logout')); ?></li>
                    <?php if(AuthComponent::user('group_id')==1): ?>
                        <li><?php echo $this->Html->link(__('Espace admin'), array('controller' => 'admin', 'action' => 'quotes')); ?></li>
                      <?php endif; ?>
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

       <div class="footer ">
          coded with love
        </div>
        

  <!--<?php echo $this->element('sql_dump'); ?>-->
</body>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
</html>