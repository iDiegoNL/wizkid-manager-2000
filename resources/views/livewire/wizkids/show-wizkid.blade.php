<div class="bg-gray-100 h-full">
    <div class="mx-auto max-w-7xl py-12 px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl">
            <div class="overflow-hidden rounded-lg bg-white shadow">
                <div class="border-b border-gray-200 px-4 py-5 sm:px-6">
                    <div class="-ml-4 -mt-4 flex flex-wrap items-center justify-between sm:flex-nowrap">
                        <div class="ml-4 mt-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="h-12 w-12 rounded-full"
                                         src="{{ $wizkid->profilePhotoUrl() }}"
                                         alt="{{ $wizkid->name }}'s profile photo">
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $wizkid->name }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="ml-4 mt-4 flex flex-shrink-0 space-x-3">
                            @can('forceDelete', $wizkid)
                                <button type="button" wire:click="forceDeleteWizkid"
                                        class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    <x-heroicon-s-trash class="-ml-1 mr-2 h-5 w-5 text-gray-400"/>
                                    <span>Delete</span>
                                </button>
                            @endcan
                            @can('delete', $wizkid)
                                <button type="button" wire:click="fireWizkid"
                                        class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    <x-heroicon-s-fire class="-ml-1 mr-2 h-5 w-5 text-gray-400"/>
                                    <span>Fire</span>
                                </button>
                            @endcan
                            @can('restore', $wizkid)
                                <button type="button" wire:click="unfireWizkid"
                                        class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    <x-heroicon-s-fire class="-ml-1 mr-2 h-5 w-5 text-gray-400"/>
                                    <span>Unfire</span>
                                </button>
                            @endcan
                            @can('edit', $wizkid)
                                <a href="#"
                                   class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    <x-heroicon-s-pencil-alt class="-ml-1 mr-2 h-5 w-5 text-gray-400"/>
                                    <span>Edit</span>
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="px-4 py-5 sm:p-0">
                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Name</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $wizkid->name }}</dd>
                        </div>
                        @auth
                            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Email</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $wizkid->email }}</dd>
                            </div>
                        @endauth
                        @auth
                            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Phone number</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $wizkid->phone_number }}</dd>
                            </div>
                        @endauth
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Role</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ ucwords($wizkid->role->value) }}</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Fired at</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $wizkid->fired_at }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
