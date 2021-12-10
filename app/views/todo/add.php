<div class="container">
    <br>
    <form method="POST" action="index.php?controller=Todo&action=store">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="start">Starting Date</label>
            <input type="text" value="<?php if (isset($_GET['start'])) echo $_GET['start']; ?>" name="start"
                   class="form-control datepicker" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="end">Ending Date</label>
            <input type="text" value="<?php if (isset($_GET['end'])) echo $_GET['end']; ?>" name="end"
                   class="form-control datepicker" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status">
                <option value="1">Planing</option>
                <option value="2">Doing</option>
                <option value="3">Complete</option>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-success btn-flat">Add</button>
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