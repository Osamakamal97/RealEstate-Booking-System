<div class="row">
    @if($show_create)
    @includeIf('livewire.realEstateOwners.create')
    @elseif($show_edit)
    @includeIf('livewire.realEstateOwners.edit')
    @endif
    @if ($show_delete_notification)
    @includeIf('admin.notifications.sweetalert')
    @endif
    <x-tables.table :title="$title" :table="$real_estate_owners">
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
            @foreach ($real_estate_owners as $real_estate_owner)
            <tr class="odd gradeX">
                <td>{{ $real_estate_owner->fullName() }}</td>
                <td>{{ $real_estate_owner->email }}</td>
                <td>{{ $real_estate_owner->mobile_number }}</td>
                <td>{{ $real_estate_owner->country }}</td>
                <td>
                    <x-tables.status-column :row="$real_estate_owner" />
                </td>
                <td style="width: 267px">
                    @can('edit_real_estate_owner')
                    <x-buttons.edit :id=" $real_estate_owner->id" />
                    @endcan
                    @can('delete_real_estate_owner')
                    <x-buttons.delete :id=" $real_estate_owner->id" />
                    @endcan
                    @can('block_real_estate_owner')
                    <x-buttons.status :row=" $real_estate_owner" />
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </x-tables.table>
</div>
