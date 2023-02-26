@extends('layouts.app')

@section('content')
    <list-products-component
        :products = {{ $products->toJson() }}
    >
    </list-products-component>
@endsection