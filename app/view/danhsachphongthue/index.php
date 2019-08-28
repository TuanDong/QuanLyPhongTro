<?php $this->setSiteTitle('Quản Lý Thuê Trọ'); ?>

<?php $this->start('body'); ?>
<div class="row">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="header smaller lighter blue">QUẢN LÝ THUÊ TRỌ</h1>

            <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
            <div class="table-header">
                DANH SÁCH PHÒNG TRỌ ĐÃ THUÊ
            </div>
            <!-- div.table-responsive -->

            <!-- div.dataTables_borderWrap -->
            <div style="margin-top: 1%;">
                <?php
                foreach ($listRenterRoom as $key => $room) {
                    ?>
                <div class="col-xs-12 col-sm-3 widget-container-col" style="margin-bottom: 2%;">
                    <div class="widget-box">
                        <div class="widget-header">

                            <h4 class="widget-title smaller" style="font-weight: bold;"> <i class="ace-icon fa fa-home align-bottom bigger-180"></i> <?= $room->NAME_ROOM ?></h4>
                            <div class="widget-toolbar">
                                <span class="label label-lg arrowed arrowed-right <?= $room->STATUS != 0 ? 'label-primary' : 'label-danger'; ?>"><i class="ace-icon fa fa-bookmark align-top bigger-120"></i></span>
                            </div>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main padding-6">
                                <div class="alert alert-info">
                                    <span class="label label-success arrowed"><i class="ace-icon fa fa-book bigger-120"></i> Tên Người Thuê:</span><span> <?= $room->Status == 1 ? $room->Full_name : '';?></span> <br>
                                    <span class="label label-success arrowed"><i class="ace-icon fa fa-book bigger-120"></i> Tiền Phòng:</span><span> <?= number_format($room->PRICE);?></span> <br>
                                    <span class="label label-success arrowed"><i class="ace-icon fa fa-book bigger-120"></i> Số Điện:</span><span> <?= $room->NUMBER_ELECTRIC;?></span> <br>
                                    <span class="label label-success arrowed"><i class="ace-icon fa fa-book bigger-120"></i> Số Nước:</span><span> <?= $room->NUMBER_WATER;?></span> <br>
                                </div>
                            </div>
                            <div class="widget-toolbox padding-8 clearfix">
                                <button class="btn btn-xs btn-primary pull-right <?= $room->STATUS != 0 ? '' : 'disabled' ?>" style="border-radius: 6px;">
                                    <i class="ace-icon fa fa-credit-card icon-on-right"></i>
                                    <span class="bigger-110">Tính Tiền</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php $this->end(); ?>