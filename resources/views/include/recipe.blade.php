<x-app-layout>
  <div class='recipe_show'>

        {{-- カクテルの数だけ繰り返す --}}
        @foreach($cocktails as $cocktail)

            レシピ名:
            <h3 class='name'>{{ $recipe->name }}</h3>

            カクテル名:
            <h4 class='cocktail'>{{ $cocktail->name }}</h4>

            含むもの:
            <h5 class='include_alc'>
            @foreach($recipe->includes as $includealc)
                {{ $inlucdealc->include_name }}
            @endforeach
            </h5>

            レシピ内容:
            <h5 class='process'>

            </h5>

            強さ:
            <h5 class='age'>{{ $cocktail->strange }}</h5>

            </h5>

        @endforeach

    </div>
</x-app-layout>