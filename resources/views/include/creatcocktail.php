<x-app-layout>
  {{-- 学生情報のフォームと、好きな教科の選択画面 --}}
  <form action="/cocktail" method="POST">
      @csrf
      <div>
          <h2>名前</h2>
          <input type="text" name="cocktail[name]" placeholder="名前" />
      </div>

      <div>
          <h2>学年</h2>
          <input type="text" name="student[grade]" placeholder="学年" />
      </div>

      <div>
          <h2>年齢</h2>
          <input type="text" name="student[age]" placeholder="年齢" />
      </div>

      <div>
          <h2>好きな教科</h2>
          @foreach($subjects as $subject)

              <label>
                  {{-- valueを'$subjectのid'に、nameを'配列名[]'に --}}
                  <input type="checkbox" value="{{ $subject->id }}" name="subjects_array[]">
                      {{$subject->subject_name}}
                  </input>
              </label>

          @endforeach
      </div>
      <input type="submit" value="保存"/>
  </form>
</x-app-layout>