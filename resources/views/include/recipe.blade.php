<x-app-layout>
  <div class='recipe_show'>

        {{-- カクテルの数だけ繰り返す --}}
        @foreach($recipes as $recipe)
          <div class='m-5'>

            <h3 class='name'>レシピ名: {{ $recipe->name }}</h3>

            {{--カクテル名:
            <h4 class='cocktail'>{{ $cocktail->name }}</h4>--}}

            含むもの:
            <h5 class='include_alc'>
            @foreach($recipe->includes as $includealc)
                {{ $includealc->include_name }}
            @endforeach
            </h5>

            @if(!empty($recipe->process))
            レシピ手順:
            <h5 class='process'><!-- $index:順番 -->
              @foreach(explode( '/', $recipe->process) as $index=>$process)
                 <p>{{$index + 1}}: {{ $process }} </p>
              @endforeach
            </h5>
            @endif
            
            {{--強さ:
            <h5 class='age'>{{ $cocktail->strange }}</h5>--}}

            </h5>
          </div>
        @endforeach

    </div>
</x-app-layout>