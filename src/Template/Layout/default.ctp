<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
$groupe="Cornec_Bouthemy";
$noms="Cornec,Bouthemy";
$username;
$password;

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
		<?= $this->assign('title', 'page1');?>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>

    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('webarena.css'); ?>
	
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><?= $this->Html->link("Page1",[""]); ?></h1>
            </li>
        </ul>
		
        <div class="top-bar-section">
            <ul class="right">
                <li><a target="_blank" href="https://book.cakephp.org/3.0/">Documentation</a></li>
                <li><a target="_blank" href="https://api.cakephp.org/3.0/">API</a></li>
            </ul>
        </div>
		
		<div class="header">
		 
		 <?= $this->Html->link("Home",["controller"=> "Arenas",'action'=>'index']); ?>
		 <?= $this->Html->link("Register",["controller"=> "Users",'action'=>'add']); ?>
		 <?= $this->Html->link("Login",["controller"=> "Users",'action'=>'login']); ?>
		 <?= $this->Html->link("Fighter",["controller"=> "Arenas",'action'=>'fighter']); ?>
		 <?= $this->Html->link("Sight",["controller"=> "Arenas",'action'=>'sight']); ?>
		 <?= $this->Html->link("Events",["controller"=> "Arenas",'action'=>'event']); ?>
		 
		</div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
		<?= "All rights reserved by the group : " ?>
		<?= $groupe ?>
		<?= ", composed of : " ?>
		<?= $noms ?>
    </footer>
</body>
</html>
