<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(!$comments->isEmpty())
                <div class="overflow-x-auto">
                    <table class="w-full bg-white border border-gray-300">
                        <thead>
                        <tr>
                            <th class="px-6 py-1 bg-gray-100 border-b border-gray-300 text-left font-semibold
                        text-gray-700">
                                ID
                            </th>
                            <th class="px-6 py-3 bg-gray-100 border-b border-gray-300 text-left font-semibold text-gray-700">
                                Name
                            </th>
                            <th class="px-6 py-3 bg-gray-100 border-b border-gray-300 text-left font-semibold text-gray-700">
                                Email
                            </th>
                            <th class="px-6 py-3 bg-gray-100 border-b border-gray-300 text-left font-semibold
                            text-gray-700">
                                Body
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm">{{ $comment->id }}</td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm">{{ $comment->name }}</td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm">{{ $comment->name }}</td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm">{{ $comment->body }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
