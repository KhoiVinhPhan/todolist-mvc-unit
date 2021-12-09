<div class="row">
    <div class="col-sm-4">
        <br />
        <a href="index.php?controller=Todo&action=add" class="btn btn-success">Add</a>
        <table class="table">
            <thead>
            <th>ID</th>
            <th>Task</th>
            <th>Date</th>
            <th>Action</th>
            </thead>
            <tbody>
            <?php foreach ($tasks as $item) { ?>
                <tr>
                    <td><?= $item->id ?></td>
                    <td><?= $item->task ?></td>
                    <td><?= $item->date ?></td>
                    <td>
                        <a href="index.php?controller=Todo&action=edit&id=<?= $item->id ?>"
                           class="btn btn-primary btn-flat">Edit</a>
                        <a href="index.php?controller=Todo&action=delete&id=<?= $item->id ?>"
                           class="btn btn-danger btn-flat">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-8">
        <div id='loading'>loading...</div>
        <div id='calendar'></div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let dataTask = <?=json_encode($tasks)?>;
        let dataEvent = [];
        dataTask.forEach(function (item, key) {
            dataEvent.push({id: item.id, title: item.task, start: item.date, url: "index.php?controller=Todo&action=edit&id=" + item.id})
        })
        let calendarEl = document.getElementById('calendar');
        let calendar = new FullCalendar.Calendar(calendarEl, {
            displayEventTime: false,
            initialDate: '2021-12-01',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,listYear'
            },
            events: dataEvent,
            selectable: true,
            dateClick: function(info) {
                window.location.href = "index.php?controller=Todo&action=add&date=" + info.dateStr;
            },
        });
        calendar.render();
    });
</script>
