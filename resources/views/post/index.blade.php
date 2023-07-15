<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(!$posts->isEmpty())
                <form class="flex justify mx-auto-end" action="{{ route('posts.search') }}" method="GET">
                    <input class="w-full border border-gray-300 rounded-l py-2 px-4 focus:outline-none focus:border-indigo-500" type="text" class="border border-gray-300
                    rounded-l
                     py-2 px-4
                    focus:outline-none
                    focus:border-indigo-500" name="search" placeholder="...">
                    <x-primary-button type="submit">{{ __('Search') }}</x-primary-button>
                </form>
                <div class="overflow-x-auto">
                    <table class="w-full bg-white border border-gray-300">
                        <thead>
                        <tr>
                            <th class="px-6 py-1 bg-gray-100 border-b border-gray-300 text-left font-semibold
                        text-gray-700">ID
                            </th>
                            <th class="px-6 py-3 bg-gray-100 border-b border-gray-300 text-left font-semibold text-gray-700">
                                Title
                            </th>
                            <th class="px-6 py-3 bg-gray-100 border-b border-gray-300 text-left font-semibold text-gray-700">
                                Body
                            </th>
                            <th class="px-6 py-3 bg-gray-100 border-b border-gray-300 text-left font-semibold
                        text-gray-700">Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm">{{ $post->id }}</td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm">{{ $post->title }}</td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm">{{ $post->body }}</td>
                                <td class="px-6 py-4 border-b border-gray-300">
                                    <div class="flex">
                                        <a href="{{ route('post.comments', $post->id) }}"
                                           class="text-indigo-600 hover:text-indigo-900" title="Comments">
                                            <svg class="svg-icon w-7 h-7" viewBox="0 0 20 20">
                                                <path
                                                    d="M14.999,8.543c0,0.229-0.188,0.417-0.416,0.417H5.417C5.187,8.959,5,8.772,5,8.543s0.188-0.417,0.417-0.417h9.167C14.812,8.126,14.999,8.314,14.999,8.543 M12.037,10.213H5.417C5.187,10.213,5,10.4,5,10.63c0,0.229,0.188,0.416,0.417,0.416h6.621c0.229,0,0.416-0.188,0.416-0.416C12.453,10.4,12.266,10.213,12.037,10.213 M14.583,6.046H5.417C5.187,6.046,5,6.233,5,6.463c0,0.229,0.188,0.417,0.417,0.417h9.167c0.229,0,0.416-0.188,0.416-0.417C14.999,6.233,14.812,6.046,14.583,6.046 M17.916,3.542v10c0,0.229-0.188,0.417-0.417,0.417H9.373l-2.829,2.796c-0.117,0.116-0.71,0.297-0.71-0.296v-2.5H2.5c-0.229,0-0.417-0.188-0.417-0.417v-10c0-0.229,0.188-0.417,0.417-0.417h15C17.729,3.126,17.916,3.313,17.916,3.542 M17.083,3.959H2.917v9.167H6.25c0.229,0,0.417,0.187,0.417,0.416v1.919l2.242-2.215c0.079-0.077,0.184-0.12,0.294-0.12h7.881V3.959z"></path>
                                            </svg>
                                        </a>
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                           class="text-indigo-600 hover:text-indigo-900 ml-4" title="Edit">
                                            <svg class="svg-icon w-7 h-7" viewBox="0 0 20 20">
                                                <path
                                                    d="M18.303,4.742l-1.454-1.455c-0.171-0.171-0.475-0.171-0.646,0l-3.061,3.064H2.019c-0.251,0-0.457,0.205-0.457,0.456v9.578c0,0.251,0.206,0.456,0.457,0.456h13.683c0.252,0,0.457-0.205,0.457-0.456V7.533l2.144-2.146C18.481,5.208,18.483,4.917,18.303,4.742 M15.258,15.929H2.476V7.263h9.754L9.695,9.792c-0.057,0.057-0.101,0.13-0.119,0.212L9.18,11.36h-3.98c-0.251,0-0.457,0.205-0.457,0.456c0,0.253,0.205,0.456,0.457,0.456h4.336c0.023,0,0.899,0.02,1.498-0.127c0.312-0.077,0.55-0.137,0.55-0.137c0.08-0.018,0.155-0.059,0.212-0.118l3.463-3.443V15.929z M11.241,11.156l-1.078,0.267l0.267-1.076l6.097-6.091l0.808,0.808L11.241,11.156z"></path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this post?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="ml-4 text-red-600 hover:text-red-900"
                                                    title="Delete">
                                                <svg class="svg-icon w-7 h-7" viewBox="0 0 20 20">
                                                    <path
                                                        d="M17.114,3.923h-4.589V2.427c0-0.252-0.207-0.459-0.46-0.459H7.935c-0.252,0-0.459,0.207-0.459,0.459v1.496h-4.59c-0.252,0-0.459,0.205-0.459,0.459c0,0.252,0.207,0.459,0.459,0.459h1.51v12.732c0,0.252,0.207,0.459,0.459,0.459h10.29c0.254,0,0.459-0.207,0.459-0.459V4.841h1.511c0.252,0,0.459-0.207,0.459-0.459C17.573,4.127,17.366,3.923,17.114,3.923M8.394,2.886h3.214v0.918H8.394V2.886z M14.686,17.114H5.314V4.841h9.372V17.114z M12.525,7.306v7.344c0,0.252-0.207,0.459-0.46,0.459s-0.458-0.207-0.458-0.459V7.306c0-0.254,0.205-0.459,0.458-0.459S12.525,7.051,12.525,7.306M8.394,7.306v7.344c0,0.252-0.207,0.459-0.459,0.459s-0.459-0.207-0.459-0.459V7.306c0-0.254,0.207-0.459,0.459-0.459S8.394,7.051,8.394,7.306"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
