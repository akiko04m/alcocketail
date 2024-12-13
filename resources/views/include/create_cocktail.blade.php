<x-app-layout>
  {{-- カクテルのフォームと、好きな教科の選択画面 --}}
  <form action="/cocktail" method="POST">
      @csrf
      <div>
          <h2>カクテル名</h2>
          <input type="text" name="cocktail[name]" placeholder="名前" />
      </div>

      {{-- <div>
          <h2></h2>
          <input type="text" name="student[grade]" placeholder="学年" />
      </div>

      <div>
          <h2>年齢</h2>
          <input type="text" name="student[age]" placeholder="年齢" />
      </div> --}}
      
      <input type="submit" value="保存"/>
  </form>
</x-app-layout>