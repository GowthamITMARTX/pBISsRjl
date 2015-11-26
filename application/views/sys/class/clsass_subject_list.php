
<div class="todo_section panel panel-default">
    <div class="todo_date">
        <h4><?= $cls->title ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Initial Amount <?= number_format($cls->initial_amount,2) ?> </h4>
        <span class="text-muted">  </span>
        <div class="pull-right">
        </div>
    </div>
    <ul class="todo_list_wrapper">
        <li data-task-title="All Subject" >
            <!--<div class="todo_checkbox">
                <input type="checkbox" name="all"  value="1"  >
            </div>-->
            <div class="todo_star">
                <span class="fa fa-star-o"></span>
            </div>
            <span class="label color_c pull-right"></span>
            <h5 class="todo_title"><a >All Subject  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= number_format($cls->fee,2) ?> </a></h5>
            <input type="hidden" name="total_fee" value="<?=$cls->fee?>" >
            <input type="hidden" name="initial_amount" value="<?=$cls->initial_amount?>" >
        </li>
        <?php foreach($records as $k => $row): ?>
            <li data-task-title="<?= $row->subject ?>" data-task-label="<?= $row->lecture ?>" >
                <div class="todo_checkbox">
                    <input type="checkbox" name="sub[]" checked  value="<?= $row->sid ?>" >
                    <input type="hidden" name="fee[<?= $row->sid ?>]"  value="<?= $row->amount ?>" >
                </div>
                <span class="label color_c pull-right"><?= $row->lecture ?></span>
                <h5 class="todo_title"><a ><?= $row->subject ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fee - Rs:<?= number_format($row->amount,2) ?> </a></h5>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<br/>
<div class="col-lg-3" >
    <div class="form-group">
        <label for="ini_fee">Initial Payment</label>
        <input type="text" id="load Class" name="amount" data-min-value="<?=$cls->initial_amount?>"  data-max-value="<?=$cls->fee?>"   class="form-control  price" value="<?= number_format($cls->initial_amount,2) ?>"  >
    </div>
</div>

<script>
    tisa_icheck.init();
    maskedInputs.init();
</script>