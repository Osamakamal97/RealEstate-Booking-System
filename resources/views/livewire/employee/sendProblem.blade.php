<div class="row inbox">
    <div class="col-md-12">
        <div class="inbox-header">
            <h1 class="pull-left">الشكوى</h1>
        </div>
        <br><br>
        <div class="inbox-content">
            <form class="inbox-compose form-horizontal" wire:submit.prevent="send" enctype="multipart/form-data">
                <div class="inbox-form-group">
                    <label class="control-label">العنوان:</label>
                    <div class="controls">
                        <input type="text" class="form-control" wire:model.defer="title">
                    </div>
                    @error('title')
                    <span id="name-error" class="help-block help-block-error"
                        style="color: #F3565D;padding-right: 10px">{{ $message }}</span>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <div class="col-md-12">
                        <textarea class="ckeditor form-control" name="editor2" rows="6" wire:model.defer="content"
                            data-error-container="#editor2_error"></textarea>
                        <div id="editor2_error">
                        </div>
                    </div>
                </div> --}}
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea style="width: 100%" rows="10" wire:model.deffer="content"></textarea>
                        {{-- <div class="col-md-12">
                        <textarea data-provide="markdown" rows="10" wire:model.deffer="content2"
                            data-error-container="#editor_error"></textarea>
                        <div id="editor_error">
                        </div>
                    </div> --}}
                        @error('content')
                        <span id="name-error" class="help-block help-block-error"
                            style="color: #F3565D;padding-right: 10px">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                {{-- <div class="inbox-compose-attachment">
                    <span class="btn green fileinput-button">
                        <i class="fa fa-plus"></i>
                        <span>
                            Add files... </span>
                        <input type="file" wire:model.defer="files" multiple>
                    </span>
                    <table role="presentation" class="table table-striped margin-top-10">
                        <tbody class="files">
                        </tbody>
                    </table>
                </div> --}}
                <div class="inbox-compose-btn">
                    <button type="submit" class="btn blue"><i class="fa fa-check"></i>Send</button>
                </div>
            </form>
        </div>
    </div>
</div>