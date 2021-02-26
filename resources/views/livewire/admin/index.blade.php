<div class="row">
    @if($show_create)
    @includeIf('livewire.admin.create')
    @elseif($show_edit)
    @includeIf('livewire.admin.edit')
    @elseif($showPermissions)
    @includeIf('livewire.admin.permissions')
    @endif
    @if ($show_delete_notification)
    @includeIf('admin.notifications.sweetalert')
    @endif
    <x-tables.table :title="$title" :table="$admins">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>الايميل</th>
                <th>أخر دخول منذ</th>
                <th>الدور</th>
                <th style="width: 60px">الحالة</th>
                <th style="width: 165px">الاعدادات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
            <tr class="odd gradeX">
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->loginTime() }}</td>
                <td>{{ $admin->getRoleNames()[0] }}</td>
                <td>
                    <x-tables.status-column :row="$admin" />
                </td>
                <td style="width: 265px">
                    <button wire:click.prevent="permissions({{ $admin->id }})" class="btn btn-sm blue">
                        الصلاحيات <i class="icon-shield"></i>
                    </button>
                    <x-buttons.edit :id="$admin->id" />
                    <x-buttons.delete :id="$admin->id" />
                </td>
            </tr>
            @endforeach
        </tbody>
    </x-tables.table>
</div>
