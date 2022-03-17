@extends('layouts.app')
@php
    $total_count = -1;
@endphp
@section('content')
<div class="p-5">
    @for ($i = 0; $i < $item_count/$per_grid; $i++)
        <div class="columns">
            @for ($j = 0; $j < $per_grid; $j++)
            @if (++$total_count < $item_count)
            <div class="column">
                <x-game-tile
                    :id="$games[$total_count]->id"
                    :title="$games[$total_count]->title"
                    :tag="$games[$total_count]->genre->name"
                    image="/images/game/{{$games[$total_count]->image}}"
                    :price="$games[$total_count]->price">
                </x-game-tile>
            </div>
            @else
            <div class="column"></div>
            @endif
            @endfor
        </div>
    @endfor
    <hr>
    {{-- Pagination --}}
    <div class="columns">
        <div class="column">
        </div>
        {{-- Laravel paginator --}}
        <div class="column">
        </div>
        <div class="column is-narrow">
            {{$games->links('vendor.pagination.default')}}
        </div>
    </div>
</div>
@endsection
