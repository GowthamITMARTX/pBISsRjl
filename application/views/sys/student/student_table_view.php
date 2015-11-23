
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Student List Filter By - <?= $this->input->get('key') ?> </h4>

</div>
<div class="modal-body"  >
    <table class=" table table-striped table-bordered ">
        <thead>
        <tr>
            <th>#</th>
            <th>Index No</th>
            <th>Full Name</th>
            <th>NIC</th>
            <th>Create Date</th>
            <th>Create By</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($records as $k => $row): ?>
            <tr data-object="<?= html_escape (json_encode(array('title'=>$row->title.$row->name , 'id'=>$row->id))) ?>" class="tr-list" >
                <td><?= $k+1 ?></td>
                <td> <?= $row->index ?> </td>
                <td> <?= $row->title ?><?= $row->name ?> </td>
                <td><?= $row->nic_no  ?></td>
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