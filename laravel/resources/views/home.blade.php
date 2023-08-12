<ul>
    @foreach ($customer as $c)
        <li>{{ $c->first_name }} {{ $c->last_name }}</li>
    @endforeach
</ul>
