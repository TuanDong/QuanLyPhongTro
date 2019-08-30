<?php $this->setSiteTitle('Thông Tin Người Thuê'); ?>
<?php $this->start('body'); ?>
<div class="row">
    <div class="col-xs-12">
        <h1 class="header smaller lighter blue"><?= isset($roomObj)? 'SỬA THÔNG TIN PHÒNG':'THÊM NGƯỜI THUÊ'; ?></h1>

        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <div class="table-header" style="text-align: center; line-height: 50px;">
            <span class="label label-xlg label-yellow arrowed-in-right arrowed-in" style="font-weight: bold; font-size: 15px; color: #D15B47;"></span>
        </div>
        <div class="row header">
            <?php 
                if (isset($error)) {
                    echo '<div id="show-alert" class="alert alert-danger">';
                    echo '<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>';
                    echo '<strong><i class="ace-icon fa fa-times"></i> Error !';
                    echo '</strong>'. $error .'<br></div>';
                }
            ?>
            <form class="form-horizontal" action="<?= isset($roomObj)? url('DanhsachphongController/updateRoom') : url('DanhsachphongController/insertRoom'); ?>" method="post" role="form">
                <?= isset($roomObj)? '<input type="hidden" name="from-field-id-room" value="'.$roomObj->ID.'">' :""; ?> 
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span class="label label-xlg label-success arrowed">Tên Người Thuê:</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="from-field-name-room" <?= isset($roomObj)? "value='".$roomObj->NAME_ROOM."'" :"" ?> placeholder="Tên người thuê phòng" class="col-xs-10 col-sm-5">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span class="label label-xlg label-success arrowed">SCMND:</span></label>
                    <div class="col-sm-9">
                        <input type="number" name="from-field-price-room" <?= isset($roomObj)? "value='".$roomObj->PRICE."'" :"" ?> placeholder="Giá phòng" class="col-xs-10 col-sm-5">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span class="label label-xlg label-success arrowed">Số Điện Thoại:</span></label>
                    <div class="col-sm-9">
                        <input type="number" name="from-field-number-electric" <?= isset($roomObj)? "value='".$roomObj->NUMBER_ELECTRIC."'" :"" ?> placeholder="Giá điện" class="col-xs-10 col-sm-5">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span class="label label-xlg label-success arrowed">Mô Tả Người Thuê:</span></label>
                    <div class="col-sm-9">
                        <div class="row col-xs-10 col-sm-5">
                            <textarea name="form-field-textarea" class="autosize-transition form-control" placeholder="Mô tả phòng" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 52px;"><?= isset($roomObj)? $roomObj->DECRIPTION:"" ?></textarea>
                        </div>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span class="label label-xlg label-success arrowed">Trạng Thái:</span></label>
                    <div class="col-sm-9">
                        <div class="checkbox">
                            <label class="block">
                                <input name="form-field-checkbox" <?= (isset($roomObj) && $roomObj->STATUS != "0")? "checked":"" ?> disabled type="checkbox" value="0" class="ace input-lg">
                                <span class="lbl bigger-120"> Đã Thuê</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-info" type="submit">
                            <i class="ace-icon fa fa-floppy-o bigger-130" style="padding-right: 5%;" ></i> Lưu
                        </button>&nbsp; &nbsp; 
                        <button class="btn" type="reset">
                            <i class="ace-icon fa fa-undo bigger-110"></i>
                            Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->end(); ?>