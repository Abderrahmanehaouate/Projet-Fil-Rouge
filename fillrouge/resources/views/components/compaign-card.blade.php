@props(['compaign'])

<div class="flex flex-col rounded-lg shadow-lg overflow-hidden">

        <div class="flex-shrink-0">
            <img class="h-58 w-full object-cover" src="{{ asset('storage/' . $compaign->thumbnail) }}" alt=" ">
        </div>

        <div class="flex-1 bg-white p-6 flex flex-col justify-between">

            <div class="flex-1">
                <p class="text-sm font-medium text-indigo-600">
                <a href="#" class="hover:underline"> {{ $compaign->category->name }} </a>
                </p>
                <a href="/compaigns/{{ $compaign->slug }}" class="block mt-2">
                    <p class="text-xl font-semibold text-gray-900"> {{ $compaign->title }} </p>
                    <p class="mt-3 text-base text-gray-500"> {!! $compaign->excerpt !!} </p>
                </a>
            </div>

            <div class="mt-6 flex items-center">
                <div class="flex-shrink-0">
                    <a href="#">
                        <span class="sr-only"> {{ $compaign->user->name }} </span>
                        <img class="h-10 w-10 rounded-full" src="https://i.pravatar.cc/104?id={{ $compaign->user->id }}" alt="">
                    </a>
                    
                </div>

            <div class="ml-3">
                <p class="text-sm font-medium text-gray-900">
                    <a href="#" class="hover:underline"> {{ $compaign->user->name }} </a>
                </p>

                <div class="flex space-x-1 text-sm text-gray-500">
                    <time datetime="2020-03-10"> {{ $compaign->created_at->diffForHumans() }} </time>
                </div>
                <div class="flex space-x-10  text-md text-gray-500">
                <span>  {{ $compaign->soutiens->count() }} dons</span>
                    <span>{{ $compaign->soutiens->sum('amount') }} € dons récoltés </span>
                </div>
            </div>
        </div>
    </div>
</div>
