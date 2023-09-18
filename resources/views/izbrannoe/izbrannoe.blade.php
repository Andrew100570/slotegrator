@if (isset($search))

    <li >{{$search}} </li>

@endif
@foreach($products as $product)
    <li>{{$product->name}}</li>
    <li>{{$product->description}}</li>
    <li>{{$product->category}}</li>
    <li>{{$product->image_url}}</li>
    </br>
@endforeach
