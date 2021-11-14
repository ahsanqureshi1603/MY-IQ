@if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif

<form action="/start-practice-test" class="inline-block">
    <label for="category">Practice</label><br>

    <input type="radio" name="category" value="math">
    <label for="math">Math</label><br>
    <input type="radio" name="category" value="verbal" checked>
    <label for="verbal">Verbal</label><br>


    <p>Question Type</p>
    <input type="checkbox" name="question_type[]" value="all_verbal">
    <label for="question_type"> All Verbal</label><br>
    <input type="checkbox" name="question_type[]" value="sentence_correction" checked>
    <label for="question_type"> sentence_correction</label><br>
    <input type="checkbox" name="question_type[]" value="critical_reasoning" checked>
    <label for="question_type"> critical_reasoning</label><br>
    <input type="checkbox" name="question_type[]" value="reading_comprehension">
    <label for="question_type"> reading_comprehension</label><br>
    <br><br>
    <input type="checkbox" name="question_type[]" value="all_quant">
    <label for="question_type"> All Quant</label><br>
    <input type="checkbox" name="question_type[]" value="data_sufficiency">
    <label for="question_type"> data_sufficiency</label><br>
    <input type="checkbox" name="question_type[]" value="problem_solving">
    <label for="question_type"> problem_solving</label><br>

    <p>Verbal Subjects</p>
    <input type="checkbox" name="subjects[]" value="all_verbal">
    <label for="all_verbal"> All Verbal</label><br>
    @foreach($verbalSubjectQuestions as $verbalSubjectQuestion)
    <input type="checkbox" name="subjects[]" value="{{$verbalSubjectQuestion['subject']}}" checked>
    <label for="{{$verbalSubjectQuestion['subject']}}"> {{$verbalSubjectQuestion['subject']}}</label><br>
    @endforeach

    <p>Math Subjects</p>
    <input type="checkbox" name="subjects[]" value="all_quant">
    <label for="all"> All Quant</label><br>
    @foreach($mathSubjectQuestions as $mathSubjectQuestion)
    <input type="checkbox" name="subjects[]" value="{{$mathSubjectQuestion['subject']}}" checked>
    <label for="{{$mathSubjectQuestion['subject']}}"> {{$mathSubjectQuestion['subject']}}</label><br>
    @endforeach


    <p>Difficulty</p>
    <input type="checkbox" name="difficulty[]" value="Easy">
    <label for="Easy"> Easy</label><br>
    <input type="checkbox" name="difficulty[]" value="Medium" checked>
    <label for="Medium"> Medium</label><br>
    <input type="checkbox" name="difficulty[]" value="Hard">
    <label for="Hard"> Hard</label><br>
    <input type="checkbox" name="difficulty[]" value="Very Hard" checked>
    <label for="Very Hard"> Very Hard</label><br>

    <p>Question Pool</p>
    <input type="radio" name="question_pool" value="unanswered" checked>
    <label for="Unanswered"> Unanswered</label><br>
    <input type="radio" name="question_pool" value="answered_and_unanswered">
    <label for="Answered and Unanswered"> Answered and Unanswered</label><br>
    <input type="radio" name="question_pool" value="incorrect">
    <label for="Incorrect"> Incorrect</label><br>
    <input type="radio" name="question_pool" value="flagged">
    <label for="Flagged"> Flagged</label><br>

    <p>Number Of Questions</p>
    <input type="radio" name="number_of_questions" value="5">
    <label for="5"> 5</label><br>
    <input type="radio" name="number_of_questions" value="10" checked>
    <label for="10"> 36</label><br>
    <input type="radio" name="number_of_questions" value="15">
    <label for="15"> 15</label><br>
    <input type="radio" name="number_of_questions" value="36">
    <label for="36"> 36</label><br>

    OR
    <!-- <input type="text" name="number_of_questions">
    <label> questions</label><br> -->



    <p>Time Limit</p>
    <input type="radio" name="time_limit" value="10">
    <label for="10"> 10</label><br>
    <input type="radio" name="time_limit" value="20" checked>
    <label for="20"> 20</label><br>
    <input type="radio" name="time_limit" value="30">
    <label for="30"> 30</label><br>
    <input type="radio" name="time_limit" value="65">
    <label for="65"> 65</label><br>


    OR
    <!-- <input type="text" name="time_limit">
    <label> Minutes</label><br> -->

    <label for="mode">Mode</label><br>
    <input type="radio" name="mode" value="practice" checked>
    <label for="math">Practice</label><br>
    <input type="radio" name="mode" value="quiz">
    <label for="verbal">Quiz</label><br>

    <button type="submit" formmethod="POST">Start</button>
    {{ csrf_field() }}
</form>