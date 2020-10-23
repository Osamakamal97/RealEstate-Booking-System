<div class="col-md-12">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption font-red-sunglo">
                <i class="icon-user font-red-sunglo"></i>
                <span class="caption-subject bold uppercase">صلاحيات المسؤول {{ $name }}</span>
            </div>
            <div class="tools">
                <a href="" class="collapse" data-original-title="" title="">
                </a>
                <a href="" class="remove" data-original-title="" title="">
                </a>
            </div>
        </div>
        <div class="portlet-body form">
            <form role="form" wire:submit.prevent="updatePermissions">
                <div class="form-group form-md-checkboxes @error('checked_permissions') has-error @enderror">
                    <label>الصلاحيات</label>
                    <div class="md-checkbox-inline">
                        @foreach ($rolePermissions as $index => $permission)
                        <div class="md-checkbox">
                            <input type="checkbox" id="checkbox{{ $index }}" class="md-check"
                                {{ $userPermissions->contains($permission) ? 'checked' : '' }} checked=""
                                wire:model="checked_permissions.{{ $permission }}">
                            <label for="checkbox{{ $index }}">
                                <span class="inc"></span>
                                <span class="check"></span>
                                <span class="box"></span>
                                {{ __('admin.'.$permission) }} </label>
                        </div>

                        @endforeach

                    </div>
                    @error('manager_role')
                    <span id="name-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        role permissions
                        <ul>
                            @foreach ($rolePermissions as $permission)
                            <li>{{ $permission }}</li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="col-md-6">
                        user permissions
                        <ul>
                            @foreach ($userPermissions as $permission)
                            <li>{{ $permission }}</li>
                            @endforeach

                        </ul>
                    </div>

                </div>
                <div class="form-actions noborder">
                    <button type="submit" class="btn blue">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>