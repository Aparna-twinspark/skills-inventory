<!-- The registration page for employees.
    By deafult 'role' assigned is "employee".
--> 
   <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">⚡⚡</h1>
            </div>
            <h3>Register to TwinSpark Skills Inventory</h3>
            <p>Create account to see it in action.</p>
            <?= $this->Flash->render(); ?>
            <!-- Use of form helper to create a customized form.-->
            <!-- Creation of form: First parameter defines the model for the form. 
                'Null' implies default model is used.
                Classes are given as second element in the parameters passed to create(). -->
            <?= $this->Form->create(    null, 
                                        ['class' => 'm-t']
                                    ) 
            ?>
               <div class="form-group">
               <!-- Makes an input element. To assign multiple classes, pass them as an array with key 'class'. -->
                    <?= $this->Form->Input('name', ['class' => 'form-control', 'placeholder' => 'Name', 'required'=>'']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->Input('email', ['class' => 'form-control', 'placeholder' => 'email@example.com', 'required'=>'']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->Input('password', ['type' => 'password', 'class' => 'form-control', 'placeholder' => 'Enter your password', 'required'=>'']) ?>
                </div>
                <!-- -->
                <?= $this->Form->button('Register', ['type' => 'submit', 'class' => 'btn btn-primary block full-width m-b']); ?>
                <?= $this->Html->link(
                        'Login',
                        ['controller' => 'Employees', 'action' => 'login'], ['class' => 'btn btn-sm btn-white btn-block']
                    );
                ?>
                <?= $this->Form->end() ?>
             </div>
    </div>
