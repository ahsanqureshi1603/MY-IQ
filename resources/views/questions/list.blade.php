<!-- {{print('<pre>' . print_r($questions, true) . '</pre>')}} -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Question list') }}
        </h2>
    </x-slot>
    <div class="flex-auto text-right mt-2">
        <a href="/admin/add-question" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add new Question</a>
    </div>
    <table class="w-full text-md rounded mb-4">
        <thead>
            <tr class="border-b">
                <th class="text-left p-3 px-5">Question</th>
                <th class="text-left p-3 px-5">Actions</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions['data'] as $question)
            <tr class="border-b hover:bg-orange-100">
                <td class="p-3 px-5">
                    {!! \Illuminate\Support\Str::limit($question['question_content']['content'], 80, '......') !!}
                </td>
                <td class="p-3 px-5">

                    <a href="/admin/edit-question/{{$question['id']}}" name="edit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>