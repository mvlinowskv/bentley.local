<section class="background-cover background-fixed background-center background-blog d-flex w-100 h-100vh align-items-center justify-content-center">
    <div class="py-3">
    <h1 class="text-center text-uppercase color-white font-h1 mb-4">Ad<span class="border-bottom">d artic</span>le</h1>
        <div class="color-white bg-black p-3 d-flex">
                <?php
            echo $this->Form->create($article, ['class' => 'mx-auto form-articles']);
            // Hard code the user for now.
            echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
            echo $this->Form->control('title', ['class' => 'border-0 w-100']);
            echo $this->Form->control('tags._ids', ['options' => $tags, 'class' => 'border-0 my-4 w-100']);
            echo $this->Form->control('body', ['rows' => '3', 'class' => 'border-0 my-4 w-100']);
            echo $this->Form->control('thumbnail', array('type' => 'file'), ['class' => 'border-0 my-4 w-100']);
            echo $this->Form->button(__('Save Article'), ['class' => 'bg-red p-3 color-white border-0 text-uppercase float-right my-3']);
            echo $this->Form->end();
        ?>
        </div>
    </div>
</section>
