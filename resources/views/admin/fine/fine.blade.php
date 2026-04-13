@extends('layouts')

@section('title', "Lam's Denda")

@section('content')

    @foreach ($borrowing as $item)
        {{ $item->user->name}} Rp.{{$item->fine}} <br>
    @endforeach

@endsection
