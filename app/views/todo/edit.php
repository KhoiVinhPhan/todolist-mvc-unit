<div>
    <br>

    <form method="POST" action="index.php?controller=Todo&action=update&id=<?= $task->id ?>">
        <div class="form-group">
            <label for="task">Task</label>
            <input type="text" name="task" class="form-control" value="<?= $task->task ?>" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="text" name="date" class="form-control" id="datepicker" value="<?= $task->date ?>" autocomplete="off">
        </div>
        <button type="submit" name="submit" class="btn btn-success btn-flat">Edit</button>
        <a href="index.php?controller=Todo&action=delete&id=<?= $task->id ?>" class="btn btn-danger btn-flat">Delete</a>
    </form>
</div>
<script>
    $( function() {
        $('#datepicker').datepicker({
            autoclose: true,
            todayHighlight: true,
            dateFormat: 'yy-mm-dd'
        });
    } );
</script>
