<x-layout-dashboard>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <h1 class="text-2xl font-semibold text-gray-900"> Edit Compaigns : {{$compaign->title}} </h1>
    </div>
<form method="POST" action="/dashboard/dashboard/{{ $compaign->id }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
        <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

            <div class="sm:col-span-3">
                <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                <div class="mt-2">
                    <input type="text" name="title" id="title" value="{{ old('title', $compaign->title) }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            @error('title')
                <p class="text-red-700 text-xm mt-2">{{ $message }}</p>
            @enderror
            </div>

            <div class="sm:col-span-3">
                <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">slug</label>
                <div class="mt-2">
                    <input type="text" name="slug" value="{{ old('slug', $compaign->slug) }}" id="slug" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('slug')
                <p class="text-red-700 text-xm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-span-full">
                <label for="thumbnail" class="block text-sm font-medium leading-6 text-gray-900">Image descripe situation</label>
                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                    <div class="text-center">
                    <img src="{{ asset('storage/' . $compaign->thumbnail) }}" alt="" class="rounded-xl ml-6" width="150">
                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                        <label for="thumbnail" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                        <span>Upload a file</span>
                        <input id="thumbnail" name="thumbnail" value="{{ old('thumbnail', $compaign->thumbnail) }}" type="file" class="sr-only">
                        </label>
                        <p class="pl-1">or drag and drop</p>
                    </div>
                        <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                    </div>
                </div>
                @error('thumbnail')
                <p class="text-red-700 text-xm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="sm:col-span-3">
                <label for="category_id" class="block text-sm font-medium leading-6 text-gray-900">Qu'est qui correspond le mieux aux raisons pour lesquelles vous collectez des fonds ?</label>
                <div class="mt-2">
                    <select id="category_id" name="category_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        @foreach (\App\Models\Category::all() as $category)
                                    <option
                                        value="{{ $category->id }}"
                                        {{ old('category_id', $compaign->category_id) == $category->id ? 'selected' : '' }}
                                    >{{ ucwords($category->name) }}
                                    </option>
                        @endforeach
                    </select>

                        @error('category')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                </div>
            </div>

            <div class="col-span-full">
                <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Paragraph of your compaign</label>
                <div class="mt-2">
                    <textarea id="body" name="body" rows="3" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6"> {{ old('body', $compaign->body) }}</textarea>
                </div>
                @error('body')
                <p class="text-red-700 text-xm mt-2">{{ $message }}</p>
                @enderror
                <p class="mt-3 text-sm leading-6 text-gray-600">Write a paragraph to describe situation of your compaign.</p>

            </div>

            <div class="col-span-full">
                <label for="excerpt" class="block text-sm font-medium leading-6 text-gray-900">Excerpt of your compaign</label>
                <div class="mt-2">
                    <textarea id="excerpt" name="excerpt" rows="3" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6">{{ old('excerpt', $compaign->excerpt) }}</textarea>
                </div>
                @error('excerpt')
                <p class="text-red-700 text-xm mt-2">{{ $message }}</p>
                @enderror
                <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences this compaign.</p>
            </div>

        </div>
    </div>
</div>


<div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


            <div class="sm:col-span-3">
                <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Où habitez-vous ?</label>
                <div class="mt-2">
                    <select id="country" name="country" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        <option value="Morocco" {{ old('country', $compaign->country) == 'Morocco' ? 'selected' : '' }} >Morocco</option>
                        <option value="Turky" {{ old('country', $compaign->country) == 'Turky' ? 'selected' : '' }} >Turky</option>
                        <option value="Algeria" {{ old('country', $compaign->country) == 'Algeria' ? 'selected' : '' }}>Algeria</option>
                    </select>

                        @error('country')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                </div>
            </div>

            <div class="col-span-full">
                <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Street address</label>
                <div class="mt-2">
                    <input type="text" name="address" value="{{ old('address', $compaign->address) }}" id="address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('address')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="sm:col-span-2 sm:col-start-1">
                <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                <div class="mt-2">
                    <input type="text" name="city" value="{{ old('city', $compaign->city) }}" id="city" autocomplete="address-level2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('city')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="sm:col-span-2">
                <label for="region" class="block text-sm font-medium leading-6 text-gray-900">State / Province</label>
                <div class="mt-2">
                    <input type="text" name="region" value="{{ old('region', $compaign->region) }}" id="region" autocomplete="address-level1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('region')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="sm:col-span-2">
                <label for="postal" class="block text-sm font-medium leading-6 text-gray-900">ZIP / Postal code</label>
                <div class="mt-2">
                    <input type="text" name="postal" value="{{ old('postal', $compaign->postal) }}" id="postal" autocomplete="postal-code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('postal')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>
        </div>
























    <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
    
</form>

</x-layout-dashboard>