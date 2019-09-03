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
                                <a href="#modal-caculator" class="bigger-125 white" data-toggle="modal">
                                    <button class="btn btn-xs btn-primary pull-right " style="border-radius: 6px;">
                                        <i class="ace-icon fa fa-credit-card icon-on-right"></i>
                                        <span class="bigger-110" style="color:<?= $room->STATUS != 0 ?'': 'red' ?> ;"><?= $room->STATUS != 0 ? 'Tính Tiền' : 'Thuê Phòng' ?></span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="clearfix"></div>
            <div class="wizard-actions" style="margin-top: 1%;">
                <ul class="pagination">
                    <li class="paginate_button previous <?= $curent_page > 1?'':'disabled'?>">
                        <a href="<?= $curent_page >1?url('DanhsachphongthueController/index',[$curent_page - 1]):''; ?>">Previous</a>
                    </li>
                    <?php 
                    for ($i=1; $i <= CEIL($total_page/12); $i++) { 
                        echo '<li class="paginate_button '.($i == $curent_page?'active':'').'" ><a href="'.url('DanhsachphongthueController/index',[$i]).'">'.$i.'</a></li>';
                    }
                    ?>
                    <li class="paginate_button next <?= $curent_page == CEIL($total_page/12)?'disabled':''?>" >
                        <a href="<?= ($curent_page < CEIL($total_page/12))? url('DanhsachphongthueController/index',[$curent_page + 1]): ''; ?>">Next</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="modal-caculator" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="smaller lighter blue no-margin">Thông Tin Phòng</h3>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin-left: 2%;">
                        <div style="margin-top: 2%;">
                            <label class="col-sm-3 label label-xlg label-info arrowed-in-right arrowed">Ngay Tính Tiền: </label>
                            <div class="col-sm-7 input-group" style="padding-left: 2%;">
                                <input class="form-control date-picker" type="text" data-provide="datepicker" disabled>
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div style="margin-top: 2%;">
                            <label class="col-sm-3 label label-xlg label-info arrowed-in-right arrowed">Số Tháng: </label>
                            <input type="number" class="col-sm-7" style="margin-left: 2%;" value="1" min="1" max="12">
                        </div>
                        <div class="clearfix"></div>
                        <div style="margin-top: 2%;">
                            <label class="col-sm-3 label label-xlg label-info arrowed-in-right arrowed">Số Điện: </label>
                            <input type="number" class="col-sm-7" min="0" style="margin-left: 2%;">
                        </div>
                        <div class="clearfix"></div>
                        <div style="margin-top: 2%;">
                            <label class="col-sm-3 label label-xlg label-info arrowed-in-right arrowed">Số Nước: </label>
                            <input type="number" class="col-sm-7" min="0"  style="margin-left: 2%;">
                        </div>
                        <div class="clearfix"></div> 
                        <div style="margin-top: 2%;">
                            <label class="col-sm-3 label label-xlg label-info arrowed-in-right arrowed">Tiền Khác: </label>
                            <input type="number" class="col-sm-7" value="0" min="0" style="margin-left: 2%;">
                        </div>
                        <div class="clearfix"></div> 
                        <div style="margin-top: 2%;">
                            <label class="col-sm-3 label label-xlg label-info arrowed-in-right arrowed">Mô Tả: </label>
                            <div class="col-sm-7">
                                <textarea name="form-field-textarea" class="autosize-transition form-control" placeholder="Mô tả đóng tiền" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal;"></textarea>
                            </div>  
                        </div>
                    </div>     
                    <div class="clearfix"></div>
                    <div style="margin-top: 2%;">
                        <hr>
                        <label class="pull-right"><h4 style="color: red;">Tổng Tiền:</h4>  </label>
                    </div>  
                    <div class="clearfix"></div>     
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
                        <i class="ace-icon fa fa-times"></i>
                        Đóng
                    </button> 
                    <button class="btn btn-sm btn-primary pull-right" style="margin-right: 2%;">
                        <i class="ace-icon fa fa-credit-card"></i>
                        Thanh Toán
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</div>
<?php $this->end();?>