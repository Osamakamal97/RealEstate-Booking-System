<div class="row">
    @if($show_form)
    @includeIf('livewire.realEstateFacilities.form')
    @endif
    @if ($show_delete_notification)
    @includeIf('admin.notifications.sweetalert',['notification_message' => $notification_message])
    @endif

    <x-tables.table :title="$title" :table="$facilities">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>النوع</th>
                <th>الحالة</th>
                <th style="width: 165px">الاعدادات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($facilities as $facility)
            <tr class="odd gradeX">
                <td>{{ $facility->name }}</td>
                <td>{{ $facility->getPlace() }}</td>
                <td>
                    <x-tables.status-column :row="$facility" />
                </td>
                <td style="width: 235px">
                    <x-buttons.edit :id="$facility->id" />
                    <x-buttons.delete :id="$facility->id" />
                </td>
            </tr>
            @endforeach
        </tbody>
    </x-tables.table>
</div>
