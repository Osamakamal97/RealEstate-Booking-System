<div class="row inbox">
    <div class="col-md-12"><br>
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

                <div class="form-group">
                    <div class="col-md-12">
                        <textarea style="width: 100%" rows="10" wire:model.defer="content"></textarea>
                        @error('content')
                        <span id="name-error" class="help-block help-block-error"
                            style="color: #F3565D;padding-right: 10px">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div style="padding-right: 25px"
                    class="form-group form-md-radios  @error('can_response') has-error @enderror">
                    <div class="col-md-12">
                        <label>هل يمكنه الرد؟</label>
                        <div class="md-radio-inline">
                            <div class="md-radio">
                                <input type="radio" id="can_response" name="can_response" class="md-radiobtn" value="1"
                                    wire:model.defer="can_response">
                                <label for="can_response">
                                    <span class="inc"></span>
                                    <span class="check"></span>
                                    <span class="box"></span>
                                    أجل </label>
                            </div>
                            <div class="md-radio">
                                <input type="radio" id="can_response2" name="can_response" class="md-radiobtn" value="0"
                                    wire:model.defer="can_response">
                                <label for="can_response2">
                                    <span class="inc"></span>
                                    <span class="check"></span>
                                    <span class="box"></span>
                                    لا </label>
                            </div>
                            @error('can_response')
                            <span id="name-error" class="help-block help-block-error"
                                style="color: #F3565D">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="inbox-compose-btn">
                    <button type="submit" class="btn blue"><i class="fa fa-check"></i>Send</button>
                </div>
            </form>
        </div>
    </div>
</div>