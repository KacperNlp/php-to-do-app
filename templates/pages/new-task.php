<div>
    <?php if(isset($params['task-title'])): ?>
        <h2><?= $params['task-title'] ;?></h2>
    <?php else: ?>
        <p>Your task didn't has title!</p>
    <?php endif;?>
    <?php if(isset($params['description'])):?>
        <p><?= $params['description'] ;?></p>
    <?php else: ?>
        <p>You didn't set any description for your task...</p>
    <?php endif;?>
</div>