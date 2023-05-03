<x-layout>
    <section class="bg-white">

        <div class="container px-6 py-10 mx-auto">
            <div class="mt-8 lg:-mx-6 lg:flex gap-2 lg:items-start">
                <div class="lg:w-1/2 lg:sticky top-5">
                    <img class="w-full object-cover rounded-xl w-92 h-96" src="{{ asset('storage/' . $compaign->thumbnail) }}" alt="">
                    <div class="my-10">
                        <div class="flex items-start my-10 mx-4">
                            <img class="object-cover object-center w-14 h-14 rounded-full" src="https://i.pravatar.cc/104?id={{ $compaign->user->id }}" alt="">

                            <div class="ml-5 lg:flex lg:items-center">

                                <div>
                                    <h1 class="text-lg text-gray-700 font-semibold dark:text-gray-700">{{ $compaign->user->name }}</h1>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Lead Developer </p>
                                </div>

                                <div class="lg:ml-20">
                                <span class="inline-block px-1 leading-none bg-green-200 text-orange-800 rounded-full font-semibold uppercase tracking-wide text-xs" >&nbsp;<span class="font-bold text-lg"> {{ $compaign->soutiens->sum('amount') }},00 </span>&nbsp;<span class="text-sm font-semibold">€ &nbsp;</span><span class="text-sm-5 text-gray-500">dons récoltés</span></span> 
                                    <span class="inline-block px-2 py-1 leading-none  text-orange-800 rounded-full font-semibold uppercase tracking-wide text-xs">  {{ $compaign->soutiens->count() }} dons</span>
                                </div>

                            </div>
                        </div>

                            <div class="flex justify-center mt-8">
                                <form action="{{ route('checkout', ['compaign' => $compaign]) }}" method="POST">
                                    @csrf
                                        <div class="flex items-center">
                                            <label for="donation-amount">
                                                <x-application-logo class="w-10 h-10 mr-2 text-gray-600" />
                                            </label>
                                            <input type="number" min="1" id="amount" name="amount" class="py-2 px-3 rounded-md border border-gray-400 focus:outline-none focus:border-blue-500" placeholder="Enter donation amount" autocomplete="off">
                                            <input type="hidden" name="compaign_id" value="{{ $compaign->id }}">
                                            <button class="bg-green-500 m-5 hover:bg-green-700 text-white font-bold py-2 px-5 border border-blue-700 rounded">Je soutiens</button>
                                        </div>
                                </form>
                                <button class="bg-blue-500 m-5 hover:bg-blue-700 text-white font-bold py-2 px-5 border border-blue-700 rounded"> <a href="/chatify/{{ $compaign->user->id }}">Contact</a></button>
                            </div>
                        </div>
                </div>

                <div class="mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                <div class="space-x-2">
                    <a href="/categories/{{ $compaign->category->slug }}">
                    <x-category-button :category="$compaign->category" />
                    </a>
                </div>

                    <a href="#" class="block mt-4 text-2xl font-semibold text-gray-800 hover:underline dark:text-black">
                        {{ $compaign->title }}
                    </a>

                    <p class="mt-3 text-sm text-gray-500 dark:text-gray-500 md:text-lg">
                    {{ $compaign->excerpt }}

                    </p>

                    <div>
                        <p class="mt-10 text-sm text-gray-500 dark:text-gray-500 sm:text-lg md:text-lg" >
                            {{ $compaign->body }}
                        </p>
                    </div>
                    <div class="">
                        <section class="col-span-8 col-start-5 mt-10 space-y-6">
                            @foreach ($compaign->comments as $comment)
                            <x-compaign-comment :comment=$comment />
                            @endforeach
                        </section>
                    </div>
                    @auth
                        <form action="/compaigns/{{ $compaign->slug }}/comments" method="POST" class="border border-gray-200 p-6 mt-10 rounded-xl">
                            @csrf
                                <header class="flex items-center">
                                <img src="https://i.pravatar.cc/104?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-xl" >
                                    <h2 class="ml-4" >Want to participate?</h2>
                                </header>
                                <div class="mt-6">
                                    <textarea name="body" class="w-full text-sm focus:outline-none p-3" id="" rows="2" placeholder="Quick, thing of something to say"></textarea>
                            @error('body')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                                </div>
                                <div class="flex justify-end mt-6 pt-6 border-t border-gray-200 pt-6">
                                    <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600 p-2">Post</button>
                                </div>
                        </form>
                    @else
                    <p class="font-semibold">
                        <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">Login</a> to leave a comment
                    </p>
                    @endauth
                </div>
            </div>
        </div>
    </section>
</x-layout>