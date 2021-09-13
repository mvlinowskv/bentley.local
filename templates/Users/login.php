<!-- in /templates/Users/login.php -->
<section class="background-center background-cover background-fixed background-login w-100 h-100vh d-flex align-items-center">
    <div class="box-content w-90 w-lg-50 mx-auto">
        <h1 class="text-center text-uppercase color-white font-h1 mb-4">L<span class="border-bottom">ogi</span>n</h1>
        <div class="users form bg-black p-4 color-white text-uppercase">
            <?= $this->Flash->render() ?>
            
            <?= $this->Form->create() ?>
            <fieldset class="w-lg-75 w-100 mx-auto">
                <?= $this->Form->control('email', ['required' => true, 'class' => 'w-75 w-lg-75 float-right']) ?>
                <?= $this->Form->control('password', ['required' => true, 'class' => 'w-75 w-lg-75 float-right']) ?>

                <?= $this->Form->submit(__('Login'), ['class' => 'float-right w-50 bg-red py-2 mt-3 border-0 text-uppercase']); ?>
                <?= $this->Form->end() ?>

                <div class="mt-3 color-white">
                    
                </div>
                
            </fieldset>
            
        </div>
    </div>

</section>