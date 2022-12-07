<div>

    <div class="mx-auto max-w-7xl py-12 px-4 sm:px-6 lg:px-8 lg:py-24">
        <div class="space-y-12">
            <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
                <div class="flex flex-row space-x-4">
                    <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">Our Team</h2>

                    <a href="#"
                       class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Add a new Wizkid
                        <x-heroicon-s-sparkles class="ml-3 -mr-1 h-5 w-5"/>

                    </a>
                </div>
                <p class="text-xl text-gray-500">
                    Meet our wicked team of Wizkids!
                </p>
            </div>
            <ul role="list"
                class="space-y-12 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 sm:space-y-0 lg:grid-cols-3 lg:gap-x-8">
                @foreach($wizkids as $wizkid)
                    <li>
                        <div class="space-y-4">
                            <div class="aspect-w-3 aspect-h-2">
                                <img class="rounded-lg object-cover shadow-lg"
                                     src="{{ $wizkid->profilePhotoUrl() ?? asset('images/owow-logo.png') }}" alt="">
                            </div>

                            <div class="space-y-1 text-lg font-medium leading-6">
                                <h3>{{ $wizkid->name }}</h3>
                                <p class="text-indigo-600">{{ ucwords($wizkid->role->value) }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
