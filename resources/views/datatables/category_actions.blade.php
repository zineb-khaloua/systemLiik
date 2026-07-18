<div class="d-flex gap-1">
    <button type="button" class="btn btn-sm btn-primary btn-edit" data-id="{{ $id }}">
        <i class="fa fa-edit"></i>
    </button>

    @isset($delete)
      <button type="button" onclick="deleteItem('{{ $route }}', {{ $id }})"
            class="btn btn-sm btn-danger">
        <i class="fa fa-trash"></i>
    </button>
    @endisset
</div>
