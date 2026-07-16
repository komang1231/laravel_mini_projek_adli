@php

    $sort = request('sort', 'asc');

    $nextSort = $sort == 'asc' ? 'desc' : 'asc';

@endphp

<a href="{{ $route }}?search={{ request('search') }}&sort={{ $nextSort }}"
    class="btn btn-outline-secondary">

    @if ($sort == 'asc')

        <i class="bi bi-sort-down"></i>

    @else

        <i class="bi bi-sort-up"></i>

    @endif

</a>