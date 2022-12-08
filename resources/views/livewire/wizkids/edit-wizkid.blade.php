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
                    </div>
                </div>
                <form wire:submit.prevent="update">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="space-y-8 divide-y divide-gray-200 pb-6">
                            <div>
                                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <x-forms.input label="Name" id="name" name="name" type="text"
                                                       wire:model.lazy="name"/>
                                        <x-forms.input-error for="name"/>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <x-forms.input label="Email" id="email" name="email" type="email"
                                                       wire:model.lazy="email"/>
                                        <x-forms.input-error for="email"/>
                                    </div>

                                    <div class="sm:col-span-4">
                                        <x-forms.input label="Phone number" id="phone_number" name="phone_number"
                                                       type="text" wire:model.lazy="phone_number"/>
                                        <x-forms.input-error for="phone_number"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 px-4 py-4 sm:px-6">
                            <div class="flex justify-end">
                                <a href="{{ route('home') }}"
                                   class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    Cancel
                                </a>
                                <button type="submit"
                                        class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
