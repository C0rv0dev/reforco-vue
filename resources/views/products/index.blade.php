@auth()
    @extends('layouts.app')

    @section('content')
        <list-products-component
            :notes = {{ $notes->toJson() }}
            :products = {{ $products->toJson() }}   
        >
        </list-products-component>
    @endsection
    
@endauth