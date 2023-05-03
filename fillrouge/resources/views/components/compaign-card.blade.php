@props(['compaign'])

<div class="flex flex-col rounded-lg shadow-lg overflow-hidden">

            <div class="flex-shrink-0">
                <img class="h-96 object-cover max-w-2xl sm:max-w-md transition-all duration-300 rounded-lg cursor-pointer filter grayscale hover:grayscale-0" src="{{ asset('storage/' . $compaign->thumbnail) }}" alt="">
            </div>


        <div class="flex-1 bg-white p-6 flex flex-col justify-between">

            <div class="flex-1">
            <a href="/categories/{{ $compaign->category->slug }}">

                <span class="inline-block px-2 py-1 leading-none bg-orange-200 text-orange-800 rounded-full font-semibold uppercase tracking-wide text-xs">{{ $compaign->category->name }}</span>
                
            </a>
                <a href="/compaigns/{{ $compaign->slug }}" class="block mt-2">
                    <p class="text-xl font-semibold text-gray-900"> {{ $compaign->title }} </p>
                    <p class="mt-3 text-base text-gray-500"> {!! $compaign->excerpt !!} </p>
                </a>
            </div>

            <div class="mt-6 flex items-center">
                <div class="flex-shrink-0">
                    <a href="/users/{{ $compaign->user->name }}">
                        <span class="sr-only"> {{ $compaign->user->name }} </span>
                        <img class="h-10 w-10 rounded-full" src="https://i.pravatar.cc/104?id={{ $compaign->user->id }}" alt="">
                    </a>
                    
                </div>

            <div class="ml-3">
                <p class="text-sm font-medium text-gray-900">
                    <a href="/users/{{ $compaign->user->name }}" class="hover:underline"> {{ $compaign->user->name }} </a>
                </p>

                <div class="flex space-x-1 text-sm text-gray-500">
                    <time datetime="2020-03-10"> {{ $compaign->created_at->diffForHumans() }} </time>
                </div>
                <div class="flex space-x-10 text-md text-gray-500">
                    
                <span class="inline-block px-2 py-1 leading-none  text-orange-800 rounded-full font-semibold uppercase tracking-wide text-xs">  {{ $compaign->soutiens->count() }} dons</span>
                    <span class="inline-block px-1 leading-none bg-green-200 text-orange-800 rounded-full font-semibold uppercase tracking-wide text-xs" >&nbsp;<span class="font-bold text-lg"> {{ $compaign->soutiens->sum('amount') }},00 </span>&nbsp;<span class="text-sm font-semibold">€ &nbsp;</span><span class="text-sm-5 text-gray-500">dons récoltés</span></span> 
                </div>

            </div>
        </div>
    </div>
</div>
