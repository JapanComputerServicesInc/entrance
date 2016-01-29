<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
            出退情報管理 -
            <?php echo $title_for_layout; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php
        // Twitter Bootstrap 3 css
        echo $this->Html->css('bootstrap.min');
    ?>

    <!-- Le styles -->
    <style>
        body {
                padding-top: 70px; /* 70px to make the container go all the way to the bottom of the topbar */
        }
        .affix {
                position: fixed;
                top: 60px;
                width: 220px;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->Html->meta('icon');
    ?>

</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php echo $this->Html->link('出退情報管理', array(
                        'controller' => 'EntranceDatas',
                        'action' => 'index'
                ), array('class' => 'navbar-brand')); ?>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    
                    <li><?php echo $this->Html->link('出社情報登録', array(
                            'controller' => 'EntranceDatas',
                            'action' => 'entrance'
                    )); ?>
                    </li>
                    <li><?php echo $this->Html->link('退社情報登録', array(
                            'controller' => 'EntranceDatas',
                            'action' => 'leave'
                    )); ?>
                    </li>
                    <!--ログインしている場合のみ表示-->
                    <?php if($auth->loggedIn()) {
                        echo'<li>';
                        echo $this->Html->link('出退情報一覧', array(
                            'controller' => 'EntranceDatas', 
                            'action' => 'adminlist'
                        ));
                        echo '</li>';
                        echo '<li>';
                        echo $this->Html->link('ログアウト', array(
                            'controller' => 'Users', 
                            'action' => 'logout'
                        ));
                        echo '</li>';
                        } ?>
                </ul>
            </div>
        </div>
    </nav>

    
    <div class="container">

        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>

    </div><!-- /container -->

        
        
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
               <?php echo $this->Html->script('bootstrap.min'); ?>
    <?php echo $this->fetch('script'); ?>

</body>
</html>
