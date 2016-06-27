    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> 
                                <span class="block m-t-xs">     
                                    <strong class="font-bold">
                                        <?php echo $user_name ?>
                                    </strong>
                                </span>  
                            </span> 
                        </a>
                    </div>
                    <div class="logo-element">
                        ⚡⚡
                    </div>
                </li>
                <?  if($role == 'admin')
                    { 
                ?>
                 <li>
                    <?= $this->Html->link(__('Manage Employees'), ['controller' => 'Employees', 'action' => 'index'], ['class' => 'nav-label']) ?>
                </li>
                 <li>
                    <?= $this->Html->link(__('Manage Skills'), ['controller' => 'Employees', 'action' => 'index'], ['class' => 'nav-label']) ?>
                </li>
                <? } ?>
                <?  if($role == 'employee')
                    { 
                ?>
                 <li>
                    <?= $this->Html->link(__('Add Skills'), ['controller' => 'Ratings', 'action' => 'index'], ['class' => 'nav-label']) ?>
                </li>
                 <li>
                    <?= $this->Html->link(__('My Skills'), ['controller' => 'Ratings', 'action' => 'view'], ['class' => 'nav-label']) ?>
                </li>
                <? } ?>
            </ul>
        </div>
    </nav>