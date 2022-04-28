<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<section class="w-100 h-100vh background-cover background-fixed background-center background-car d-flex justify-content-center align-items-center">

<div class="box-content w-100 w-lg-75">

    <h1 class="text-center text-uppercase color-white font-h1 mb-4">U<span class="border-bottom">ser</span>s</h1>
    <div class="users index content bg-black">
        <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'bg-red p-3 color-white float-right']) ?>
        <div class="table-responsive">
            <table class="w-90 mx-auto color-white">
                <thead>
                    <tr>
                        <th class="p-2 color-red"><?= $this->Paginator->sort('id') ?></th>
                        <th class="p-2 color-red"><?= $this->Paginator->sort('email') ?></th>
                        <th class="p-2 color-red"><?= $this->Paginator->sort('password') ?></th>
                        <th class="p-2 color-red"><?= $this->Paginator->sort('created') ?></th>
                        <th class="p-2 color-red"><?= $this->Paginator->sort('modified') ?></th>
                        <th class="actions p-2"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="p-2"><?= $this->Number->format($user->id) ?></td>
                        <td class="p-2"><?= h($user->email) ?></td>
                        <td class="p-2"><?php echo mb_strimwidth(h($user->password), 0, 20, "..."); ?></td>
                        <td class="p-2"><?= h($user->created) ?></td>
                        <td class="p-2"><?= h($user->modified) ?></td>
                        <td class="actions p-2">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $user->id], ['class' => 'p-2 bg-red color-white mb-2']) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'p-2 bg-white color-black mb-2']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)] ) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
        </div>
    </div>
    
</div>

</section>
