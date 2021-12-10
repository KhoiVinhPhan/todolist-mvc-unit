<div class="container">
    <br>

    <form method="POST" action="index.php?controller=Todo&action=update&id=<?= $task->id ?>">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="<?= $task->title ?>" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="start">Starting Date</label>
            <input type="text" name="start" class="form-control datepicker" value="<?= $task->start ?>"
                   autocomplete="off">
        </div>
        <div class="form-group">
            <label for="end">Ending Date</label>
            <input type="text" name="end" class="form-control datepicker" value="<?= $task->end ?>" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status">
                <option value="1" <?php if ($task->status == 1) echo "selected"; ?> >Planing</option>
                <option value="2" <?php if ($task->status == 2) echo "selected"; ?> >Doing</option>
                <option value="3" <?php if ($task->status == 3) echo "selected"; ?> >Complete</option>
            </select>
        </div>

        <button type="submit" name="submit" class="btn btn-success btn-flat">Edit</button>
        <a href="index.php?controller=Todo&action=delete&id=<?= $task->id ?>" class="btn btn-danger btn-flat">Delete</a>
    </form>
</div>
<script>
    $(function () {
        $('.datepicker').datepicker({
            autoclose: true,
            todayHighlight: true,
            dateFormat: 'yy-mm-dd'
        });
    });
</script>
