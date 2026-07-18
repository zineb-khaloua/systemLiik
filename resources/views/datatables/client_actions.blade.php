<div class="d-flex justify-content-end">
    @isset($show)
        <a href="{{ $show }}" class="action-btn" title="Voir">
            <i class="far fa-eye"></i>
        </a>
    @endisset

    @isset($edit)
        <a href="{{ $edit }}" class="action-btn" title="Modifier">
            <i class="fa fa-edit"></i>
        </a>
    @endisset

    @isset($delete)
        <button onclick="{{ $delete }}" class="action-btn delete" title="Supprimer">
            <i class="fa fa-trash"></i>
        </button>
    @endisset

    @isset($extra)
        {!! $extra !!}
    @endisset
</div>
