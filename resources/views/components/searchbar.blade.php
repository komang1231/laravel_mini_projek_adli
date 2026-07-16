<form action="{{ $route }}" method="GET">

    <input
        type="hidden"
        name="sort"
        value="{{ request('sort', 'asc') }}">

    <div class="input-group">

        <span class="input-group-text">
            <i class="bi bi-search"></i>
        </span>

        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="{{ $placeholder }}"
            value="{{ request('search') }}">

        <button class="btn btn-primary" type="submit">
            Cari
        </button>

    </div>

</form>