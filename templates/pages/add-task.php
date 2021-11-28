<div class="add-task-form">
    <h2 class="add-task-form-header">Add your new task</h2>
    <form method="post" action="/?action=added">
        <label class="form-label">
            <span class="form-label-text">Title:</span>
            <input class="form-input" type="text" id="title" name="task-title" placeholder="Task title...">
        </label>
        <label class="form-label">
            <span class="form-label-text">Description:</span>
            <textarea class="form-textarea" name="description"></textarea>
        </label>
        <input class="button" type="submit" value="Set new task!">
    </form>
</div>