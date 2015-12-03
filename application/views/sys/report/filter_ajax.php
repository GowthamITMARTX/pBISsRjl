<table id="new_datatools" class=" table table-striped table-bordered ">
    <thead>
    <tr>
        <th width="5%">#</th>
        <th width="10%">Batch</th>
        <th width="10%">Course</th>
        <th width="10%">Class</th>
        <th width="10%">Student ID</th>
        <th width="15%">Student </th>
        <th width="15%">Total Fee</th>
        <th width="15%"> Paid Total</th>
        <th width="10%"> Balance</th>
    </tr>
    </thead>
    <tbody>
    <?php $tot =0 ; $paid =0 ;  ?>
        <?php foreach($result as $k => $row): ?>
           <tr>
               <td><?=$k+1?></td>
               <td><?= $row->batch ?></td>
               <td><?= $row->course ?></td>
               <td><?= $row->class ?></td>
               <td><?= $row->index ?></td>
               <td><?= $row->title ?><?= $row->name ?></td>
               <td><?= number_format($row->fee ,2) ?></td>
               <td><?= number_format($row->amount,2) ?></td>
               <td><?= number_format($row->fee - $row->amount,2) ?></td>
           </tr>
            <?php $tot += $row->fee ; $paid  += $row->amount ; ; ?>
        <?php endforeach; ?>

    </tbody>
    <tfoot>
        <tr>
            <td colspan="6"  ></td>
            <td><?= number_format($tot ,2) ?></td>
            <td><?= number_format($paid ,2) ?></td>
            <td><?= number_format($tot - $paid ,2) ?></td>
        </tr>
    </tfoot>

</table>
<script>
    $('#new_datatools').dataTable({
        dom:
        '<"well well-sm"<"row"<"col-md-4 clearfix"l><"col-md-8 clearfix"fT>r>>'+
        't'+
        '<"row"<"col-md-5 clearfix"i><"col-md-7 clearfix"p>>',
        tableTools: {
            "sSwfPath": "<?= base_url() ?>assets/lib/DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
            "sRowSelect": "os",
            "sRowSelector": 'td:first-child'
        }
    });
</script>