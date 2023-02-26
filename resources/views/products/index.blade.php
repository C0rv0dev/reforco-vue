@extends('layouts.app')

@section('content')
    <show-products-component
        :products = {{ $products->toJson() }}
    >
    </show-products-component>
@endsection