@extends('layouts.app') @section('content')
<div class="container mx-auto px-10 py-6">
    <h1 class="text-blue-500 uppercase tracking-wide font-semibold">
        Popular Games
    </h1>
    <livewire:popular-games>
        <div class="flex flex-col lg:flex-row my-10">
            <div class="recently-reviewed w-full lg:w-3/4 mr-0 lg:mr-32">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">
                    Recently Reviewed
                </h2>

                <livewire:recently-reviewed>
                </div>

                <div class="most-anticipated lg:w-1/4 mt-12 lg:mt-0">
                    <h2
                        class="text-blue-500 uppercase tracking-wide font-semibold"
                    >
                        Most Anticipated
                    </h2>
                   <livewire:most-anticipated>


                    <div class="coming-soon-container space-y-10 mt-8">
                        <h2
                            class="text-blue-500 uppercase tracking-wide font-semibold"
                        >
                            Coming Soon!
                        </h2>
                        <livewire:coming-soon>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Container -->

        @endsection

</div>
