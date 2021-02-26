<div class="row">

    @if($show_create)
    @includeIf('livewire.users.create')
    @elseif($show_edit)
    @includeIf('livewire.users.edit')
    @endif
    @if ($show_delete_notification)
    @includeIf('admin.notifications.sweetalert')
    @endif

    <x-tables.table :title="$title" :table="$users">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>البريد الالكتروني</th>
                <th>رقم الهاتف</th>
                <th>الدولة</th>
                <th>الحالة</th>
                <th style="width: 165px">الاعدادات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="odd gradeX">
                <td>{{ $user->fullName() }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->mobile_number }}</td>
                <td>{{ $user->country }}</td>
                <td>
                    <x-tables.status-column :row="$user" />
                </td>
                <td style="width: 235px">
                    @can('edit_user')
                    <x-buttons.edit :id=" $user->id" />
                    @endcan
                    @can('delete_user')
                    <x-buttons.delete :id=" $user->id" />
                    @endcan
                    @can('block_user')
                    <x-buttons.status :row=" $user" />
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </x-tables.table>
</div>
