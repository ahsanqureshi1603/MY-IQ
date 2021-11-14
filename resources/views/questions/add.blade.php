<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Question') }}
        </h2>
    </x-slot>


    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif

    <div class="add_question_container">
        <form action="/admin/add-question" class="inline-block">
            <div class="head-option-container">
                <div class="head-options">
                    <label for="question[category]">Category</label>
                    <select name="question[category]" id="question[category]" data-select="category" class="select-drop">
                        <option value="math" selected="selected">Math</option>
                        <option value="verbal">Verbal</option>
                    </select>
                </div>
                <div class="head-options">
                    <label for="question[section]">Section</label>
                    <select name="question[section]" id="question[section]" data-select="section" class="select-drop">
                        <option value="data_sufficiency" selected="selected">Data Sufficiency</option>
                        <option value="problem_solving">Problem Solving</option>
                        {{-- data-notshow, when math option is selected hiding --}}
                        <option value="critical_reasoning" data-notshow="math">Critical Reasoning</option>
                        <option value="reading_comprehension" data-notshow="math">Reading Comprehension</option>
                        <option value="sentence_correction" data-notshow="math">Sentence Correction</option>
                    </select>
                </div>

                <div class="head-options">
                    <label for="question[difficulty]">Difficulty</label>
                    <select name="question[difficulty]" id="question[difficulty]" data-select="difficulty" class="select-drop">
                        <option value="Easy" selected="selected">Easy</option>
                        <option value="Medium">Medium</option>
                        <option value="Hard">Hard</option>
                        <option value="Very Hard">Very Hard</option>
                    </select>
                </div>

            </div>
            <div class="d-flex" style="margin-top: 2rem">
                <h6 class="main-heads">Subjects :</h6>
                <div class="subj-container">
                    <p>Verbal Subjects</p>
                    <div class="js-verbal-subs d-block">
                        <div class="subj-radio">
                            @foreach($verbalSubjects as $verbalSubject)
                            <div class="radio-row">
                                <input type="checkbox" name="subjects[{{$verbalSubject['id']}}]" id="{{$verbalSubject['name']}}" value="{{$verbalSubject['name']}}">
                                <label for="{{$verbalSubject['name']}}" class="mb-0 pl-2 radio-row-label"> {{$verbalSubject['name']}}</label><br>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <p>Math Subjects</p>
                    <div class="js-math-subs d-block">
                        <div class="subj-radio">
                            @foreach($mathSubjects as $mathSubject)
                            <div class="radio-row">
                                <input type="checkbox" name="subjects[{{$mathSubject['id']}}]" id="{{$mathSubject['name']}}" value="{{$mathSubject['name']}}">
                                <label for="{{$mathSubject['name']}}" class="mb-0 pl-2 radio-row-label"> {{$mathSubject['name']}}</label><br>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <p>Add New Subject</p>
            <label for="question[new_subject]">New Subject</label>
            <input type="text" name="new_subject">

            <br><br>
            <div class="editor-content-container">
                <label for="question_content[content]" class="main-label-heading">Question Content</label>
                <div id="MathPreview-1" class="preview-1 MathPreview"></div>
                <div class="editor-container">
                    <textarea name="question_content[content]" class="text-editor " id="question-content" placeholder='Enter your question'> <p>If x = <code class="redactor-katex katex-loaded" data-source="\dfrac{7}{9} - \dfrac{15}{18} + \dfrac{10}{12}"><span class="katex"><span class="katex-mathml"><math><semantics><mrow><mfrac><mrow><mn>7</mn></mrow><mrow><mn>9</mn></mrow></mfrac><mo>âˆ’</mo><mfrac><mrow><mn>1</mn><mn>5</mn></mrow><mrow><mn>1</mn><mn>8</mn></mrow></mfrac><mo>+</mo><mfrac><mrow><mn>1</mn><mn>0</mn></mrow><mrow><mn>1</mn><mn>2</mn></mrow></mfrac></mrow><annotation encoding="application/x-tex">\dfrac{7}{9} - \dfrac{15}{18} + \dfrac{10}{12}</annotation></semantics></math></span><span aria-hidden="true" class="katex-html"><span class="strut" style="height: 1.32144em;"></span><span class="strut bottom" style="height: 2.00744em; vertical-align: -0.686em;"></span><span class="base textstyle uncramped"><span class="mord reset-textstyle displaystyle textstyle uncramped"><span class="sizing reset-size5 size5 reset-textstyle textstyle uncramped nulldelimiter"></span><span class="mfrac"><span class="vlist"><span class="" style="top: 0.686em;"><span class="fontsize-ensurer reset-size5 size5"><span class="" style="font-size: 0em;">â€‹</span></span><span class="reset-textstyle textstyle cramped"><span class="mord textstyle cramped"><span class="mord mathrm">9</span></span></span></span><span class="" style="top: -0.23em;"><span class="fontsize-ensurer reset-size5 size5"><span class="" style="font-size: 0em;">â€‹</span></span><span class="reset-textstyle textstyle uncramped frac-line"></span></span><span class="" style="top: -0.677em;"><span class="fontsize-ensurer reset-size5 size5"><span class="" style="font-size: 0em;">â€‹</span></span><span class="reset-textstyle textstyle uncramped"><span class="mord textstyle uncramped"><span class="mord mathrm">7</span></span></span></span><span class="baseline-fix"><span class="fontsize-ensurer reset-size5 size5"><span class="" style="font-size: 0em;">â€‹</span></span>â€‹</span></span></span><span class="sizing reset-size5 size5 reset-textstyle textstyle uncramped nulldelimiter"></span></span><span class="mbin">âˆ’</span><span class="mord reset-textstyle displaystyle textstyle uncramped"><span class="sizing reset-size5 size5 reset-textstyle textstyle uncramped nulldelimiter"></span><span class="mfrac"><span class="vlist"><span class="" style="top: 0.686em;"><span class="fontsize-ensurer reset-size5 size5"><span class="" style="font-size: 0em;">â€‹</span></span><span class="reset-textstyle textstyle cramped"><span class="mord textstyle cramped"><span class="mord mathrm">1</span><span class="mord mathrm">8</span></span></span></span><span class="" style="top: -0.23em;"><span class="fontsize-ensurer reset-size5 size5"><span class="" style="font-size: 0em;">â€‹</span></span><span class="reset-textstyle textstyle uncramped frac-line"></span></span><span class="" style="top: -0.677em;"><span class="fontsize-ensurer reset-size5 size5"><span class="" style="font-size: 0em;">â€‹</span></span><span class="reset-textstyle textstyle uncramped"><span class="mord textstyle uncramped"><span class="mord mathrm">1</span><span class="mord mathrm">5</span></span></span></span><span class="baseline-fix"><span class="fontsize-ensurer reset-size5 size5"><span class="" style="font-size: 0em;">â€‹</span></span>â€‹</span></span></span><span class="sizing reset-size5 size5 reset-textstyle textstyle uncramped nulldelimiter"></span></span><span class="mbin">+</span><span class="mord reset-textstyle displaystyle textstyle uncramped"><span class="sizing reset-size5 size5 reset-textstyle textstyle uncramped nulldelimiter"></span><span class="mfrac"><span class="vlist"><span class="" style="top: 0.686em;"><span class="fontsize-ensurer reset-size5 size5"><span class="" style="font-size: 0em;">â€‹</span></span><span class="reset-textstyle textstyle cramped"><span class="mord textstyle cramped"><span class="mord mathrm">1</span><span class="mord mathrm">2</span></span></span></span><span class="" style="top: -0.23em;"><span class="fontsize-ensurer reset-size5 size5"><span class="" style="font-size: 0em;">â€‹</span></span><span class="reset-textstyle textstyle uncramped frac-line"></span></span><span class="" style="top: -0.677em;"><span class="fontsize-ensurer reset-size5 size5"><span class="" style="font-size: 0em;">â€‹</span></span><span class="reset-textstyle textstyle uncramped"><span class="mord textstyle uncramped"><span class="mord mathrm">1</span><span class="mord mathrm">0</span></span></span></span><span class="baseline-fix"><span class="fontsize-ensurer reset-size5 size5"><span class="" style="font-size: 0em;">â€‹</span></span>â€‹</span></span></span><span class="sizing reset-size5 size5 reset-textstyle textstyle uncramped nulldelimiter"></span></span></span></span></span></code>, then (1 â€“ x)<sup>2</sup> = </p> </textarea>
                </div>
                <input type="button" value="Preview" class="renderBtn" style="float: right; font-size: initial; margin-top: .5em">
            </div>

            <div id="output"></div>

            <div class="ques-extra-container">
                <label for="question[question_extra]">Question Extra</label>
                <input type="text" name="question[question_extra]">
            </div>

            <p class="answer-question-heading">Answer Options</p>

            <div class="editor-content-container">
                <div class="op-container">
                    <input type="radio" name="answer_key[key]" id="op-radio-0" value="0" checked>
                    <label for="op-radio-0">Option 1</label>
                </div>
                {{-- <input type="text" name="answer[options][0]" value="Option 1"><br><br> --}}
                <div id="MathPreview-2" class="preview-2 MathPreview"></div>
                <div class="editor-container">
                    <textarea name="answer[options][0]" class="option-editor" id="option-editor-1">Option 1</textarea>
                </div>

                <input type="button" value="Preview" class="renderBtn" style="float: right; font-size: initial; margin-top: .5em">

            </div>


            <div class="editor-content-container">
                <div class="op-container">
                    <input type="radio" name="answer_key[key]" id="op-radio-1" value="1">
                    <label for="op-radio-1">Option 2</label>
                </div>

                <div id="MathPreview-3" class="preview-3 MathPreview"></div>
                <div class="editor-container">
                    <textarea name="answer[options][1]" id="option-editor-2" class="option-editor">Option 2</textarea>
                </div>

                <input type="button" value="Preview" class="renderBtn" style="float: right; font-size: initial; margin-top: .5em">
            </div>




            <div class="editor-content-container">
                <div class="op-container">
                    <input type="radio" name="answer_key[key]" id="op-radio-2" value="2">
                    <label for="op-radio-2">Option 3</label>
                </div>

                <div id="MathPreview-4" class="preview-4 MathPreview"></div>
                <div class="editor-container">
                    <textarea name="answer[options][2]" id="option-editor-3" class="option-editor">Option 3</textarea>
                </div>

                <input type="button" value="Preview" class="renderBtn" style="float: right; font-size: initial; margin-top: .5em">
            </div>



            <div class="editor-content-container">
                <div class="op-container">
                    <input type="radio" name="answer_key[key]" id="op-radio-3" value="3">
                    <label for="op-radio-3">Option 4</label>
                </div>

                <div id="MathPreview-5" class="preview-5 MathPreview"></div>
                <div class="editor-container">
                    <textarea name="answer[options][3]" id="option-editor-4" class="option-editor">Option 4</textarea>
                </div>

                <input type="button" value="Preview" class="renderBtn" style="float: right; font-size: initial; margin-top: .5em">
            </div>





            <div class="editor-content-container">
                <div class="op-container">
                    <input type="radio" name="answer_key[key]" id="op-radio-4" value="4">
                    <label for="op-radio-4">Option 5</label>
                </div>

                <div id="MathPreview-6" class="preview-6 MathPreview"></div>
                <div class="editor-container">
                    <textarea name="answer[options][4]" id="option-editor-5" class="option-editor">Option 5</textarea>
                </div>

                <input type="button" value="Preview" class="renderBtn" style="float: right; font-size: initial; margin-top: .5em">
            </div>



            {{-- <p>Answer Key</p> --}}
            {{-- <input type="radio" name="answer_key[key]" value="0" checked>
        <label for="0">Option 1</label><br> --}}
            {{-- <input type="radio" name="answer_key[key]" value="1"> --}}
            {{-- <label for="1">Option 2</label><br> --}}
            {{-- <input type="radio" name="answer_key[key]" value="2"> --}}
            {{-- <label for="2">Option 3</label><br> --}}
            {{-- <input type="radio" name="answer_key[key]" value="3">
        <label for="3">Option 4</label><br>
        <input type="radio" name="answer_key[key]" value="4">
        <label for="4">Option 5</label><br><br><br> --}}

            <div class="editor-content-container">
                <div class="op-container">
                    <label for="answer_key[explanation_text]" class="explanation-text">Explanation Text</label>
                </div>

                <div id="MathPreview-7" class="preview-7 MathPreview"></div>
                <div class="editor-container">
                    <textarea name="answer_key[explanation_text]" class="option-editor" id="explanation-editor" placeholder='Explanation text'> Explanation text test </textarea>
                </div>

                <input type="button" value="Preview" class="renderBtn" style="float: right; font-size: initial; margin-top: .5em">
            </div>

            <div class="ques-extra-container">
                <label for="answer_key[explanation_video]">Explanation Video</label>
                <input type="text" name="answer_key[explanation_video]" value="https://www.youtube.com/watch?v=fNFzfwLM72c" style="margin-bottom: 20px">
            </div>

            <div class="form-group">
                <button type="submit" formmethod="POST" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
            </div>
            {{ csrf_field() }}
        </form>
    </div>
</x-app-layout>