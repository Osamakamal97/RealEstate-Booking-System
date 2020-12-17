<div style="height: 380px">
    <div class="row">
        <div class="col-md-6">
            <div class="form-body ">
                <div class="form-group form-md-line-input 
                @error('google_map_address') has-error @enderror">
                    <input type="text" class="form-control" id="form_control_1" wire:model.defer="google_map_address">
                    <label for="form_control_1" @error('google_map_address') style="color: #F3565D" @enderror>العنوان
                        باستخدام خرائط قوقل</label>
                    @error('google_map_address')
                    <span id="google_map_address-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-body ">
                <div class="form-group form-md-line-input 
                @error('photos') has-error @enderror">
                    <input type="text" class="form-control" id="form_control_1" wire:model.defer="photos">
                    <label for="form_control_1" @error('photos') style="color: #F3565D" @enderror>صور
                        العقار</label>
                    @error('photos')
                    <span id="photos-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form id="fileupload" action="../assets/global/plugins/jquery-file-upload/server/php/" method="POST"
                enctype="multipart/form-data">
                <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                <div class="row fileupload-buttonbar">
                    <div class="col-lg-7">
                        <!-- The fileinput-button span is used to style the file input field as button -->
                        <span class="btn green fileinput-button">
                            <i class="fa fa-plus"></i>
                            <span> Add files... </span>
                            <input type="file" name="files[]" multiple=""> </span>
                        <button type="submit" class="btn blue start">
                            <i class="fa fa-upload"></i>
                            <span> Start upload </span>
                        </button>
                        <button type="reset" class="btn warning cancel">
                            <i class="fa fa-ban-circle"></i>
                            <span> Cancel upload </span>
                        </button>
                        <button type="button" class="btn red delete">
                            <i class="fa fa-trash"></i>
                            <span> Delete </span>
                        </button>
                        <input type="checkbox" class="toggle">
                        <!-- The global file processing state -->
                        <span class="fileupload-process"> </span>
                    </div>
                    <!-- The global progress information -->
                    <div class="col-lg-5 fileupload-progress fade">
                        <!-- The global progress bar -->
                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                            aria-valuemax="100">
                            <div class="progress-bar progress-bar-success" style="width:0%;"> </div>
                        </div>
                        <!-- The extended global progress information -->
                        <div class="progress-extended"> &nbsp; </div>
                    </div>
                </div>
                <!-- The table listing the files available for upload/download -->
                <table role="presentation" class="table table-striped clearfix">
                    <tbody class="files"> </tbody>
                </table>
            </form>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Demo Notes</h3>
                </div>
                <div class="panel-body">
                    <ul>
                        <li> Metronic does not include server side demo scripts(php, .net, ruby, etc)
                            since server side part must be revised by a developer(buyer) in terms of
                            secure file uploading according to his project requirements.
                            Also This dome does not implement the server side part of the plugin. For
                            server side demos you can refer to the plugin's official documentation
                            above. </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>