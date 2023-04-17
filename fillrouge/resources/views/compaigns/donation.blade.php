<x-layout>



@if ($compaigns->count())
        <x-compaigns-grid :compaigns="$compaigns" />
    @else
        <p class="text-center mt-10"> No compaigns yet . Please check back later.  </p>
@endif




</x-layout>