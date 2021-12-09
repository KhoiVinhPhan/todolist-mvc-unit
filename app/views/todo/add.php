<div>
    <br>
    <form method="POST" action="index.php?controller=Todo&action=store">
        <div class="form-group">
            <label for="task">Task</label>
            <input type="text" name="task" class="form-control" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="text" value="<?php if(isset($_GET['date'])) echo $_GET['date']; ?>" name="date" class="form-control" id="datepicker" autocomplete="off">
        </div>
        <button type="submit" name="submit" class="btn btn-success btn-flat">Add</button>
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