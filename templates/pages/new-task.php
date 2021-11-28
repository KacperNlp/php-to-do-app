<div class="new-task-container">
    <?php if(isset($params['task-title']) && $params['task-title'] !== '' ): ?>
        <h2 class="new-task-title"><?= $params['task-title'] ;?></h2>
    <?php else: ?>
        <p class="empty-form-data">Your task didn't has title!</p>
    <?php endif;?>
    <?php if(isset($params['description']) && $params['description'] !== '' ):?>
        <p class="new-task-description"><?= $params['description'] ;?></p>
    <?php else: ?>
        <p class="empty-form-data">You didn't set any description for your task...</p>
    <?php endif;?>
</div>