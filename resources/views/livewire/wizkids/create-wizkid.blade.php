<div class="bg-gray-100 h-full">
    <div class="mx-auto max-w-7xl py-12 px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl">
            <div class="overflow-hidden rounded-lg bg-white shadow">
                <div class="border-b border-gray-200 px-4 py-5 sm:px-6">
                    <h2 class="text-2xl font-bold tracking-tight sm:text-3xl">
                        Add a new Wizkid to the family!
                    </h2>
                    <p class="mt-1 text-gray-500">
                        You're about to create a new Wizkid? Wicked! Please fill out the form below.
                    </p>
                </div>
                <form wire:submit.prevent="create">
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

                                    <div class="sm:col-span-3">
                                        <x-forms.select label="Role" id="role" name="role" wire:model.lazy="role">
                                            <option selected disabled>Please select a role</option>
                                            @foreach(\App\Enums\WizkidRole::cases() as $role)
                                                <option value="{{ $role->value }}">{{ ucwords($role->value) }}</option>
                                            @endforeach
                                        </x-forms.select>
                                        <x-forms.input-error for="role"/>
                                    </div>

                                    <div class="sm:col-span-4">
                                        <x-forms.input label="Profile photo" id="profile_photo" name="profile_photo"
                                                       type="file" class="shadow-none" wire:model.lazy="profile_photo"/>
                                        <x-forms.input-error for="profile_photo"/>
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
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
