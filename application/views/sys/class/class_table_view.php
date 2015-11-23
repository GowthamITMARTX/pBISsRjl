
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Class List Filter By - <?= $this->input->get('key') ?> </h4>

</div>
<div class="modal-body"  >
    <table  class=" table table-striped table-bordered ">
        <thead>
        <tr>
            <th>#</th>
            <th>Batch</th>
            <th>Course</th>
            <th>Class Code</th>
            <th>Class Name</th>
            <th>Create Date</th>
            <th>Create By</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($records as $k => $row): ?>
            <tr data-object="<?= html_escape (json_encode($row)) ?>" class="tr-list" >
                <td><?= $k+1 ?></td>
                <td> <?= $row->batch ?> </td>
                <td> <?= $row->course ?> </td>
                <td> <?= $row->code ?> </td>
                <td><?= $row->title ?> </td>
                <td><?= $row->create_date ?></td>
                <td><?= $row->user ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>

<script>
    $(function(){
        $('#myModal').find('table').dataTable();
    })
</script>