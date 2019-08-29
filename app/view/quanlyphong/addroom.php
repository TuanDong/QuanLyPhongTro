<?php $this->setSiteTitle('Thêm Phòng'); ?>

<?php $this->start('body'); ?>
<div class="row">
    <div class="col-xs-12">
        <h1 class="header smaller lighter blue">THÊM PHÒNG TRỌ</h1>

        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <div class="table-header" style="text-align: center; line-height: 50px;">
            <span class="label label-xlg label-yellow arrowed-in-right arrowed-in" style="font-weight: bold; font-size: 15px; color: #D15B47;"></span>
        </div>
        <div class="row header">
            <form class="form-horizontal" action="<?= url('DanhsachphongController/insertRoom'); ?>" method="post" role="form">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span class="label label-xlg label-success arrowed">Tên Phòng:</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="from-field-name-room" placeholder="Name Room" class="col-xs-10 col-sm-5">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span class="label label-xlg label-success arrowed">Giá Phòng:</span></label>
                    <div class="col-sm-9">
                        <input type="number" name="from-field-price-room" placeholder="Price Room" class="col-xs-10 col-sm-5">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span class="label label-xlg label-success arrowed">Số Điện:</span></label>
                    <div class="col-sm-9">
                        <input type="number" name="from-field-number-electric" placeholder="Number electric" class="col-xs-10 col-sm-5">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span class="label label-xlg label-success arrowed">Số Nước:</span></label>
                    <div class="col-sm-9">
                        <input type="number" name="from-field-number-water" placeholder="Number water" class="col-xs-10 col-sm-5">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span class="label label-xlg label-success arrowed">Mô Tả Phòng:</span></label>
                    <div class="col-sm-9">
                        <div class="row col-xs-10 col-sm-5">
                            <textarea name="form-field-textarea" class="autosize-transition form-control" placeholder="Mô tả phòng" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 52px;"></textarea>
                        </div>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span class="label label-xlg label-success arrowed">Trạng Thái:</span></label>
                    <div class="col-sm-9">
                        <div class="checkbox">
                            <label class="block">
                                <input name="form-field-checkbox" disabled type="checkbox" value="0" class="ace input-lg">
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
