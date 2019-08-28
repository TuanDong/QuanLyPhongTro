<?php $this->setSiteTitle('Danh Sách Phòng'); ?>

<?php $this->start('body'); ?>
<div class="row">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="header smaller lighter blue">DANH SÁCH PHÒNG TRONG DÃY TRỌ</h1>

            <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
            <div class="table-header">
                BẢNG PHÒNG
                <div style="float: right; margin:0% 2% 0 0;">
                    <button class="btn btn-sm btn-success"> THÊM </button>
                </div>
            </div>
            <!-- div.table-responsive -->

            <!-- div.dataTables_borderWrap -->
            <div>
                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="center">
                                STT
                            </th>
                            <th>Tên Phòng</th>
                            <th>Giá</th>
                            <th>Số Điện</th>
                            <th>Số Nước</th>
                            <th>Trạng Thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stt = 1;
                        foreach ($listRoom as $key => $room) {
                            ?>
                        <tr>
                            <td class="center"><?= $stt; ?></td>

                            <td><?= $room->NAME_ROOM; ?></td>
                            <td><?= number_format($room->PRICE) . ' VND'; ?></td>
                            <td><?= $room->NUMBER_ELECTRIC; ?></td>
                            <td><?= $room->NUMBER_WATER; ?></td>

                            <td>
                                <span class="label label-sm <?= ($room->STATUS == 1) ? 'label-success arrowed arrowed-righ' : 'label-warning arrowed-in' ?> "><?= ($room->STATUS == 1) ? 'Đã thuê' : 'Phòng trống' ?></span>
                            </td>
                            <td>
                                <div class="hidden-sm hidden-xs btn-group">
                                    <button class="btn btn-xs btn-success">
                                        <a href="<?= url('DanhsachphongController/romdetail',[$room->ID]);?>" style="color: #fff;"><i class="ace-icon fa fa-eye bigger-120"></i></a>
                                    </button>

                                    <button class="btn btn-xs btn-info" >
                                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                                    </button>

                                    <button class="btn btn-xs btn-danger">
                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                    </button>
                                </div>

                                <div class="hidden-md hidden-lg">
                                    <div class="inline pos-rel">
                                        <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                            <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                            <li>
                                                <a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
                                                    <span class="blue">
                                                        <i class="ace-icon fa fa-eye bigger-120"></i>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
                                                    <span class="green">
                                                        <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
                                                    <span class="red">
                                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                            $stt++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$('#dynamic-table')
// .wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
.DataTable({
    bAutoWidth: false,
    "aoColumns": [{
            "bSortable": false
        },
        null, null, null, null, null,
        {
            "bSortable": false
        }
    ],
    "aaSorting": [],


    //"bProcessing": true,
    //"bServerSide": true,
    //"sAjaxSource": "http://127.0.0.1/table.php"	,

    //,
    //"sScrollY": "200px",
    //"bPaginate": false,

    // "sScrollX": "100%",
    //"sScrollXInner": "120%",
    //"bScrollCollapse": true,
    //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
    //you may want to wrap the table inside a "div.dataTables_borderWrap" element

    // "iDisplayLength": 50
    select: {
        style: 'single'
    }
});
function clickTD() {
    console.log('click');
}
</script>
<?php $this->end(); ?>
