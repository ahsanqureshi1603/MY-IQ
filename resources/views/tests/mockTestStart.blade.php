<label for="category">Choose order</label>
@if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif

<form action="/start-test" class="inline-block">

    <input type="radio" name="categoryOrder" value="math-verbal">
    <label for="math-verbal">Math->Verbal</label><br>
    <input type="radio" name="categoryOrder" value="verbal-math">
    <label for="verbal-math">Verbal->Math</label><br>

    <button type="submit" formmethod="POST">Start</button>
    {{ csrf_field() }}
</form>