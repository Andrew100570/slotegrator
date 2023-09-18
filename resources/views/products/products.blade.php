
<div class="formorder__title title">Поиск продуктов</div>
<form name="search" action="{{ route('search') }}" method="get" enctype="multipart/form-data">
    @csrf
    <input name="search" >
    <input  type="submit" value="Поиск">

</form>

<div class="formorder__title title">Cписок продуктов</div>
<form name="orderProductsForm" action="{{ route('get_products') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input name="name" value="Введите имя">

    <input name="description" value="Описание">

    <input name="category" value="Категория">

    <input name="image_url[]" type="file" multiple>

    <input  type="submit" value="Добавить новый продукт">

</form>

@foreach($products as $product)

    <li>{{$product->name}}</li>
    <li>{{$product->description}}</li>
    <li>{{$product->category}}</li>
    <li>{{$product->image_url}}</li>
    {{--@if (isset($auth))--}}
    <form name="orderIzbrannoeForm" action="{{ route('post_izbrannoe') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input name="izbrannoe" type="hidden" value="{{$product->id}}">
        <input  type="submit" value="Добавить в избранное">
    </form>
    {{--@endif--}}
    @if ($product->izbrannoe > 0)

        <a href="{{route('get_izbrannoe')}}">Избранное </a>

    @endif
    </br>
@endforeach

