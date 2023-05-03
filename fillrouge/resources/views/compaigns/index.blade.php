<x-layout>

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-white 0">
    <main>
        <x-flash />
    <div>
        <!-- Hero card -->
        <div class="relative">
        <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gray-100" ></div>
            <div class="relative shadow-xl  sm:overflow-hidden">
            <div class="absolute inset-0" style="background-size: cover;">
                <img class="h-full w-full object-cover" src="https://images.unsplash.com/photo-1521737852567-6949f3f9f2b5?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2830&q=80&sat=-100" alt="People working on laptops">
                <div class="absolute inset-0 bg-indigo-700 mix-blend-multiply"></div>
            </div>
            <div class="relative px-4 py-16 sm:px-6 sm:py-24 lg:py-32 lg:px-8">
                <h1 class="text-center text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                <span class="block text-white">Votre plateforme d'entraide</span>
                <span class="block text-indigo-200">customer support</span>
                </h1>
                <p class="mt-6 max-w-lg mx-auto text-center text-xl text-indigo-200 sm:max-w-3xl">Nous assurons vos arrières.

Une équipe internationale s'occupe exclusivement de la fiabilité et de la sécurité de notre plateforme, Nous assurons le succès des cagnottes à travers le monde, depuis plus de dix ans. Ne vous en faites pas, vous êtes couvert(e).</p>
                <div class="mt-10 max-w-sm mx-auto sm:max-w-none sm:flex sm:justify-center">
                <div class="space-y-4 sm:space-y-0 sm:mx-auto sm:inline-grid sm:grid-cols-2 sm:gap-5">
                    <a href="#" class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-indigo-700 bg-white hover:bg-indigo-50 sm:px-8"> Get started </a>
                    <a href="#" class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-500 bg-opacity-60 hover:bg-opacity-70 sm:px-8"> Live demo </a>
                </div>
                </div>
            </div>
        </div>
</div>
</main>
</div>

    @if ($compaigns->count())
      <x-compaigns-grid :compaigns="$compaigns" />
    @else

      <p class="text-center mt-10"> No compaigns yet . Please check back later.  </p>
    @endif

    
    <div class="relative 0 bg-gray-100">
    <section aria-labelledby="category-heading" class="pt-24 sm:pt-32 xl:max-w-7xl xl:mx-auto xl:px-8 mb-5">
        <div class="px-4 sm:px-6 sm:flex sm:items-center sm:justify-between lg:px-8 xl:px-0">
            <h2 id="category-heading" class="text-2xl font-extrabold tracking-tight text-gray-900 ">Find your type to donate with Category</h2>
        </div>

        <div class="mb-4 flow-root">
            <div class="my-2">
                <div class="box-content py-2 relative h-80 overflow-x-auto xl:overflow-visible">
                    <div class="absolute min-w-screen-xl px-4 flex space-x-8 sm:px-6 lg:px-8 xl:relative xl:px-0 xl:space-x-0 xl:grid xl:grid-cols-5 xl:gap-x-8">

                    @foreach (\App\Models\Category::all() as $category)
                            <a href="/categories/{{ $category->slug }}" class="relative w-56 h-80 rounded-lg p-6 flex flex-col overflow-hidden hover:opacity-75 xl:w-auto">
                                <span aria-hidden="true" class="absolute inset-0">
                                    <img src="https://images.unsplash.com/photo-1528459801416-a9e53bbf4e17?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=712&q=80" alt="" class="w-full h-full object-center object-cover">
                                </span>
                                <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
                                <span class="relative mt-auto text-center text-xl font-bold text-white"> {{ ucwords($category->name) }} </span>
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 px-4 sm:hidden">
            <a href="#" class="block text-sm font-semibold text-indigo-600 hover:text-indigo-500">Browse all categories<span aria-hidden="true"> &rarr;</span></a>
        </div>
    </section>













<div class="relative bg-gray-900 0">
    <div class="h-80 w-full absolute bottom-0 xl:inset-0 xl:h-full">
        <div class="h-full w-full xl:grid xl:grid-cols-2">
            <div class="h-full xl:relative xl:col-start-2">
                <img class="h-full w-full object-cover opacity-25 xl:absolute xl:inset-0" src="https://images.unsplash.com/photo-1521737852567-6949f3f9f2b5?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2830&q=80&sat=-100" alt="People working on laptops">
            <div aria-hidden="true" class="absolute inset-x-0 top-0 h-32 bg-gradient-to-b from-gray-900 xl:inset-y-0 xl:left-0 xl:h-full xl:w-32 xl:bg-gradient-to-r"></div>
    </div>
    </div>
    </div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 xl:grid xl:grid-cols-2 xl:grid-flow-col-dense xl:gap-x-8">
    <div class="relative pt-12 pb-64 sm:pt-24 sm:pb-64 xl:col-start-1 xl:pb-24">
        <h2 class="text-sm font-semibold text-indigo-300 tracking-wide uppercase">Valuable Metrics</h2>
        <p class="mt-3 text-3xl font-extrabold text-white">Get actionable data that will help grow your business</p>
        <p class="mt-5 text-lg text-gray-300">Rhoncus sagittis risus arcu erat lectus bibendum. Ut in adipiscing quis in viverra tristique sem. Ornare feugiat viverra eleifend fusce orci in quis amet. Sit in et vitae tortor, massa. Dapibus laoreet amet lacus nibh integer quis. Eu vulputate diam sit tellus quis at.</p>
    <div class="mt-12 grid grid-cols-1 gap-y-12 gap-x-6 sm:grid-cols-2">
        <p>
            <span class="block text-2xl font-bold text-white">8K+</span>
            <span class="mt-1 block text-base text-gray-300"><span class="font-medium text-white">Companies</span> use laoreet amet lacus nibh integer quis.</span>
        </p>

        <p>
            <span class="block text-2xl font-bold text-white">25K+</span>
            <span class="mt-1 block text-base text-gray-300"><span class="font-medium text-white">Countries around the globe</span> lacus nibh integer quis.</span>
        </p>

        <p>
            <span class="block text-2xl font-bold text-white">98%</span>
            <span class="mt-1 block text-base text-gray-300"><span class="font-medium text-white">Customer satisfaction</span> laoreet amet lacus nibh integer quis.</span>
        </p>

        <p>
            <span class="block text-2xl font-bold text-white">12M+</span>
            <span class="mt-1 block text-base text-gray-300"><span class="font-medium text-white">Issues resolved</span> lacus nibh integer quis.</span>
        </p>
      </div>
    </div>
  </div>
</div>

</x-layout>