
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Payment List Filter By - <?= $this->input->get('key') ?> </h4>

</div>
<div class="modal-body"  >
    <table class=" table table-striped table-bordered ">
        <thead>
        <tr>
            <th>#</th>
            <th>Tran Id </th>
            <th>Student Name</th>
            <th>Amount</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($records as $k => $row): ?>
            <tr data-for="refresh" data-object="<?= html_escape (json_encode(array('title'=> $row->code  , 'id'=>$row->id))) ?>" class="tr-list" >
                <td><?= $k+1 ?></td>
                <td> <?= $row->code ?> </td>
                <td> <?= $row->title ?><?= $row->name ?> </td>
                <td class="text-right" ><?= number_format($row->amount,2)  ?></td>
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