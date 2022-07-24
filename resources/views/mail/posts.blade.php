Hi {{ $user->name }},

@foreach ($posts as $item)
    <h2>{{$item->title}}</h2>
    <div>{{$item->description}}</div>
@endforeach