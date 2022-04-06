<ul>

    @foreach($products as $item)
    <li> 
        <img src="{{ asset($item->product_thumbnail) }}" style="width: 30px; height: 30px;">
        {{ $item->product_name_en }}

    </li>
    @endforeach


</ul>