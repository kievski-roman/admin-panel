
<div class="max-w-2xl mx-auto">
    @if (session('ok'))
        <div class="mb-4 rounded-lg border border-green-200 bg-green-50 p-3 text-sm">
            {{ session('ok') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-5 rounded-2xl border bg-white p-6 shadow-sm">
        <div>
            <label class="block text-sm font-medium mb-1">Ім’я</label>
            <input type="text" wire:model.defer="first_name"
                   class="w-full rounded-lg border px-3 py-2 focus:outline-none focus:ring"
                   placeholder="Іван">
            @error('first_name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Прізвище</label>
            <input type="text" wire:model.defer="last_name"
                   class="w-full rounded-lg border px-3 py-2 focus:outline-none focus:ring"
                   placeholder="Петренко">
            @error('last_name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Дата народження</label>
            <input type="date" wire:model.defer="birthday"
                   class="w-full rounded-lg border px-3 py-2 focus:outline-none focus:ring">
            @error('birthday') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <button type="submit"
                class="inline-flex items-center gap-2 rounded-xl bg-gray-900 px-4 py-2 text-black hover:bg-gray-800">
            Надіслати заявку
        </button>
    </form>

    <p class="mt-4 text-sm text-gray-500">
        Заповнюючи форму, ви погоджуєтеся на обробку персональних даних.
    </p>
</div>
