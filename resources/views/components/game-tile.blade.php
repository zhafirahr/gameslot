
<a href="{{ route('games.show', ["id"=>$id]) }}">
    <div class="card">
        <div class="card-content">
            <div class="columns is-centered is-mobile p-3">
                <x-image-round :src="$image" :alt="$title" size=128/>
            </div>
            <div class="columns is-centered is-mobile p-3">
                <p class="title is-4">{{$title}}</p>
            </div>
            <div class="columns is-centered is-mobile">
                <button class="button is-small is-success is-light has-text-success-dark has-text-weight-semibold is-4">
                    {{$tag}}
                </button>
            </div>
            {{-- Card footer --}}
            <footer class="card-footer">
                <div class="card-footer-item is-size-4">
                    ${{$price}}
                </div>
            </footer>
        </div>
    </div>
</a>