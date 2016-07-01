<?php
 $this->start('nav');
?>

	<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                           <?= $this->Html->image('profile_small.jpg')?>
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Sys admin <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="/users/logout">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li class="active">
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Districts</span></span></a>
                    <ul class="nav nav-second-level">
                        <li><?= $this->Html->link(__('Add New District'), ['action' => 'add']) ?></li>
                        <li><?= $this->Html->link(__('View All'), ['action' => 'index']) ?></li>
                    </ul>
                                    
                
             
            </ul>

        </div>
    </nav>

 <?php 
	$this->end();
 ?>