<x-app-layout>
    <div>
        <form action='/include' method='post'>{{-- web.phpのinclude--}}
            @csrf
            <input type="text" name = include[name] />
            <input type="number" name = include[strange] />

            <a href="">{{ $includes->category->name }}</a>

            <input type="submit" />
        </form>
    </div>
  <div class="m-5">
      <form action='/include' method='post'>{{-- web.phpのinclude--}}
        @foreach ($includes as $includes)
            <div class='post'>
                <h2 class='title'>{{ $includes->name }}</h2>
                <p class='body'>{{ $includes->strange }}</p>
            </div>
        @endforeach
    </div>
</x-app-layout>