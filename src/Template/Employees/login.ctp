<!-- Login page-->

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">⚡⚡</h1>
            </div>
            <h3>Welcome to TwinSpark Skills Inventory App</h3>
            <p>Login to report and manage your skills.
            </p>
            <?= $this->Flash->render(); ?>
            <p>Login in using the form below!</p>
            <?= $this->Form->create(null, ['class' => 'm-t']); ?>
                <div class="form-group">
                    <?= $this->Form->Input('email', ['class' => 'form-control', 'placeholder' => 'email@example.com', 'required'=>'']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->Input('password', ['type' => 'password', 'class' => 'form-control', 'placeholder' => 'Enter your password', 'required'=>'']) ?>
                </div>
                <?= $this->Form->button('Login', ['type' => 'submit', 'class' => 'btn btn-primary block full-width m-b']); ?>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <?= $this->Html->link(
                        'Create an account',
                        ['controller' => 'Employees', 'action' => 'add'], ['class' => 'btn btn-sm btn-white btn-block']
                    );
                ?>
            <?= $this->Form->end() ?>
        </div>
    </div>