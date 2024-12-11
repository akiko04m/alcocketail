<x-app-layout>
    <div class='cocktailshow'>

    {{-- カクテルの数だけ繰り返す --}}
    @foreach($cocktails as $cocktail)

        カクテル名:
        <h3 class='name'>{{ $cocktail->name }}</h3>

        含むお酒:
        <h5 class=''>
        {{-- ある生徒に関連する教科の数だけ繰り返す --}}
        @foreach($cocktail->includes as $include)
            {{ $inlucde->include_name }}
        @endforeach

        強さ:
        <h5 class='age'>{{ $cocktail->strange }}</h5>

        </h5>

    @endforeach

</div>
</x-app-layout>