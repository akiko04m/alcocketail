<x-app-layout>
    <div>
        <form action='/include' method='post'>{{-- web.phpのinclude--}}
            @csrf
            <input type="text" name = include[name] />
            <input type="number" name = include[strange] />


            <input type="submit" />
        </form>
    </div>
  <div class="m-5">
      <form action='/include' method='post'>{{-- web.phpのinclude--}}
        {{-- @foreach (参照データ塊(コントローラーで定義されたもの) as 1個取り出して処理する（書いたタイミングで定義されたもの）) --}}
        @foreach ($includes as $include){{--ここで定義--}}
            <div class='post'>
                <h2 class='title'>{{ $include->name }}</h2>
                <p class='body'>{{ $include->strange }}</p>



            </div>
        @endforeach
    </div>
</x-app-layout>