<div class="row">
    @if($show_real_estate_data)
    @includeIf('livewire.realEstates.show')
    @endif
    @if ($show_delete_notification)
    @includeIf('admin.notifications.sweetalert',['notification_message' => $notification_message])
    @endif

    <x-tables.table :title="$table_name" :table="$real_estates">
        <thead>
            <tr>
                <th>اسم العقار</th>
                <th>النوع</th>
                <th>العنوان</th>
                <th>السعر للليلة</th>
                <th>الحالة</th>
                <th style="width: 165px">الاعدادات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($real_estates as $real_estate)
            <tr class="odd gradeX">
                <td>{{ $real_estate->name }}</td>
                <td>{{ $real_estate->type }}</td>
                <td>{{ $real_estate->address }}</td>
                <td>{{ $real_estate->price }}</td>
                <td>{{ $real_estate->getConfirm() }}</td>
                <td style="width: 245px">
                    <button wire:click.prevent="show({{ $real_estate->id }})" class="btn btn-sm yellow">عرض
                        <i class="icon-frame"></i>
                    </button>
                    <button wire:click.prevent="accept({{ $real_estate->id }})" class="btn btn-sm blue">
                        موافقة <i class="icon-check"></i>
                    </button>
                    <button wire:click.prevent="reject({{ $real_estate->id }})" class="btn btn-sm red">
                        رفض <i class="icon-close"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </x-tables.real-estates>
</div>
