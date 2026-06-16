@if(! in_array($row->email, ['sadmin@admin.com', 'admin@admin.com'], true))
<div class="justify-content-center d-flex">
    <a href="{{ route('admins.edit', $row->id) }}" title="{{ __('messages.common.edit') }}"
       class="btn px-1 text-primary fs-3 user-edit-btn" data-id="{{$row->id}}">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <a href="javascript:void(0)" data-id="{{ $row->id }}" title="{{ __('messages.common.delete') }}"
       class="btn px-1 text-danger fs-3 admin-delete-btn">
         <i class="fa-solid fa-trash-can"></i>
    </a>
</div>
@endif
