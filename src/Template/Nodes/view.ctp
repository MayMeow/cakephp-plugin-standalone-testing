<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $node
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Node'), ['action' => 'edit', $node->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Node'), ['action' => 'delete', $node->id], ['confirm' => __('Are you sure you want to delete # {0}?', $node->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Nodes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Node'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="nodes view large-9 medium-8 columns content">
    <h3><?= h($node->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($node->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($node->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($node->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($node->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Body') ?></h4>
        <?= $this->Text->autoParagraph(h($node->body)); ?>
    </div>
</div>
