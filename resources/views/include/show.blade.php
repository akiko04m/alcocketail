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
        <div class='grid grid-cols-1 gap-2 sm:grid-cols-2 lg:grid-cols-3'>
            <!-- flexは一直線に gridは横並びに grid-cols-2は2列でお願いします gap-2はyの間を2に-->
            <!-- 検索：レスポンシブ対応 -->
            @foreach ($includes as $include){{--ここで定義--}}
                <div class='flex flex-col items-center justify-center my-2 p-3 bg-yellow-50'>
                    <h2 class='title'>{{ $include->name }}</h2>
                    <p class='body'>{{ $include->strange }}</p>
                    <p>使用レシピの度数範囲 :
                        {{ isset($include->min_strange)?$include->min_strange:'-' }}% ~
                        {{ isset($include->max_strange)?$include->max_strange:'-' }}%</p>
                    <p>レシピ数 : {{ $include->recipe_count }}</p>
                </div>
                <!-- cloudinalyAPIを使うときはAPIキー -->
            @endforeach
        </div>
    </div>
</x-app-layout>