<x-app-layout>
  @push('styles')
    <!-- この中にheadタグに書くはずだったものを書くよ -->
    <link rel="stylesheet" href="{{ asset('css/sample.css') }}">
    <!-- assetでpublic内のモノを参照できるよ！ -->
  @endpush
  <x-slot name="header">
    <div class ='flex justify-between items-center'>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ $title }}
      </h2>
      <a href='' class='bg-gray-300 w-10 h-10 rounded-full flex items-center justify-center hover:bg-gray-400 hover:-translate-y-0.5 '>+</a>
      <!--tailwindちゅうやつや！！！ブックマークをみるんや-->
    </div>
  </x-slot>
  <div>レシピ数：{{count($recipes)}}</div>
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
                <a href='/recipe/show/{{$includealc->id}}' id='includealc'>
                  {{ $includealc->name }}
                </a>
                <!-- aタグはハイパーリンクだよ！ -->
                <!-- hrefがハイパーリファレンスの略だよ！ -->
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