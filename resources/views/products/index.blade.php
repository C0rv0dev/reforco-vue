@extends('layouts.app')

@section('content')
    <div>
        <show-products-component
            :products = {{ $products->toJson() }}
        >
        </show-products-component>
    </div>
    <create-products-component></create-products-component>
@endsection