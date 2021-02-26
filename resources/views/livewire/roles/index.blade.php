<div class="row">
    @if($show_create)
    @includeIf('livewire.roles.create')
    @elseif($show_edit)
    @includeIf('livewire.roles.edit')
    @endif

    @if ($show_delete_notification)
    @includeIf('admin.notifications.sweetalert')
    @elseif($show_delete_permission_notification)
    @includeIf('admin.notifications.edit_permission')
    @endif

    <x-tables.table :title="$title" :table="$roles">
        <thead>
            <tr>
                <th>الاسم</th>
                <th style="width: 165px">الاعدادات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
            <tr class="odd gradeX">
                <td>{{ $role->name }}</td>
                <td>
                    <x-buttons.edit :id="$role->id" />
                    <x-buttons.delete :id="$role->id" />
                </td>
            </tr>
            @endforeach
        </tbody>
    </x-tables.table>
</div>
