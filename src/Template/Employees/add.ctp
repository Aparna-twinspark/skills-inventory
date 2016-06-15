    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IN+</h1>

            </div>
            <h3>Register to TwinSpark Skills Inventory</h3>
            <p>Create account to see it in action.</p>
            <?= $this->Flash->render(); ?>
            <?= $this->Form->create(    null, 
                                        ['class' => 'm-t']
                                    ) 
            ?>
               <div class="form-group">

                    <?= $this->Form->Input('name', ['class' => 'form-control', 'placeholder' => 'Name', 'required'=>'']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->Input('email', ['class' => 'form-control', 'placeholder' => 'email@example.com', 'required'=>'']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->Input('password', ['type' => 'password', 'class' => 'form-control', 'placeholder' => 'Enter your password', 'required'=>'']) ?>
                </div>
                <?= $this->Form->button('Register', ['type' => 'submit', 'class' => 'btn btn-primary block full-width m-b']); ?>
                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <?= $this->Html->link(
                        'Login',
                        ['controller' => 'Employees', 'action' => 'login'], ['class' => 'btn btn-sm btn-white btn-block']
                    );
                ?>
                <?= $this->Form->end() ?>
             </div>
    </div>
