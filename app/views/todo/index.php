<div class="row">
    <div class="col-sm-4">
        <br/>
        <a href="index.php?controller=Todo&action=add" class="btn btn-success">Add</a>
        <table class="table">
            <thead>
            <th>Title</th>
            <th>Starting Date</th>
            <th>Ending Date</th>
            <th>Status</th>
            <th>Action</th>
            </thead>
            <tbody>
            <?php foreach ($tasks as $item) { ?>
                <tr>
                    <td><?= $item->title ?></td>
                    <td><?= $item->start ?></td>
                    <td><?= $item->end ?></td>
                    <td>
                        <?php
                        if ($item->status == 1) echo "Planing";
                        if ($item->status == 2) echo "Doing";
                        if ($item->status == 3) echo "Complete";
                        ?>
                    </td>
                    <td>
                        <a href="index.php?controller=Todo&action=edit&id=<?= $item->id ?>"
                           class="btn btn-primary btn-sm">Edit</a>
                        <a href="index.php?controller=Todo&action=delete&id=<?= $item->id ?>"
                           class="btn btn-danger btn-sm">Delete</a>
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
            let color = '';
            if (item.status == 1) {
                color = '#048243'
            }
            if (item.status == 2) {
                color = '#FFAB0F'
            }
            if (item.status == 3) {
                color = '#58656D'
            }
            dataEvent.push({
                id: item.id,
                title: item.title,
                start: item.start,
                end: item.end,
                color: color,
                url: "index.php?controller=Todo&action=edit&id=" + item.id
            })
        })
        let calendarEl = document.getElementById('calendar');
        let calendar = new FullCalendar.Calendar(calendarEl, {
            initialDate: '2021-12-01',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listYear,year'
            },
            events: dataEvent,
            selectable: true,
            select: function (info) {
                console.log(info.startStr);
                console.log(info.endStr);
                window.location.href = "index.php?controller=Todo&action=add&start=" + info.startStr + "&end=" + info.endStr;
            }
        });
        calendar.render();
    });
</script>
