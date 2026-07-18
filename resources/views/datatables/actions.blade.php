<div class="d-flex gap-1">
    @isset($show)
        <a href="{{ $show }}" class="btn btn-sm btn-success">
            <i class="far fa-eye"></i>
        </a>
    @endisset

    @isset($edit)
       <a href="{{ route($route.'.edit', $id) }}"
       class="btn btn-sm btn-primary">
        <i class="fa fa-edit"></i>
    </a>
    @endisset

    @isset($delete)
      <button onclick="deleteItem('{{ $route }}', {{ $id }})"
            class="btn btn-sm btn-danger">
        <i class="fa fa-trash"></i>
    </button>
    @endisset

    @isset($extra)
        {!! $extra !!}
    @endisset
</div>