@php
    $guardValue = old('guard_name', $permission->guard_name ?? 'web');
@endphp

<div class="grid gap-6">
    <!-- Permission Name -->
    <div>
        <label class="block text-sm font-semibold text-zinc-300" for="name">{{ __('Permission Name') }}</label>
        <input id="name" name="name" type="text" value="{{ old('name', $permission->name ?? '') }}" 
            class="mt-1 block w-full rounded-lg border-zinc-700 bg-zinc-800 text-white focus:border-blue-500 focus:ring-blue-500 placeholder-zinc-500 shadow-sm transition-colors px-3 py-2" placeholder="e.g. edit-posts" required>
        @error('name')
            <p class="mt-2 text-sm text-red-400 font-medium">{{ $message }}</p>
        @enderror
    </div>

    <!-- Guard Name -->
    <div>
        <label class="block text-sm font-semibold text-zinc-300" for="guard_name">{{ __('Guard Name') }}</label>
        <input id="guard_name" name="guard_name" type="text" value="{{ $guardValue }}" 
            class="mt-1 block w-full rounded-lg border-zinc-700 bg-zinc-800 text-white focus:border-blue-500 focus:ring-blue-500 placeholder-zinc-500 shadow-sm transition-colors px-3 py-2" required>
        @error('guard_name')
            <p class="mt-2 text-sm text-red-400 font-medium">{{ $message }}</p>
        @enderror
        <p class="mt-2 text-xs text-zinc-500 italic">{{ __('Default is usually "web".') }}</p>
    </div>
</div>