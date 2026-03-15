@php
    $selectedRole = old('role', isset($user) ? $user->getRoleNames()->first() : '');
@endphp

<div class="grid gap-6">
    <!-- Name Field -->
    <div>
        <label class="block text-sm font-semibold text-zinc-300" for="name">{{ __('Name') }}</label>
        <input id="name" name="name" type="text" value="{{ old('name', $user->name ?? '') }}" 
            class="mt-1 block w-full rounded border-zinc-700 bg-zinc-800 text-white focus:border-blue-500 focus:ring-blue-500 placeholder-zinc-500 shadow-sm px-3 py-2" required>
        @error('name')
            <p class="mt-2 text-sm text-red-400 font-medium">{{ $message }}</p>
        @enderror
    </div>

    <!-- Email Field -->
    <div>
        <label class="block text-sm font-semibold text-zinc-300" for="email">{{ __('Email') }}</label>
        <input id="email" name="email" type="email" value="{{ old('email', $user->email ?? '') }}" 
            class="mt-1 block w-full rounded border-zinc-700 bg-zinc-800 text-white focus:border-blue-500 focus:ring-blue-500 placeholder-zinc-500 shadow-sm px-3 py-2" required>
        @error('email')
            <p class="mt-2 text-sm text-red-400 font-medium">{{ $message }}</p>
        @enderror
    </div>

    <!-- Password Field -->
    <div>
        <label class="block text-sm font-semibold text-zinc-300" for="password">{{ __('Password') }}</label>
        <input id="password" name="password" type="password" 
            class="mt-1 block w-full rounded border-zinc-700 bg-zinc-800 text-white focus:border-blue-500 focus:ring-blue-500 placeholder-zinc-500 shadow-sm px-3 py-2" {{ isset($user) ? '' : 'required' }}>
        @error('password')
            <p class="mt-2 text-sm text-red-400 font-medium">{{ $message }}</p>
        @enderror
        @if(isset($user))
            <p class="mt-2 text-xs text-zinc-500 italic">{{ __('Leave blank to keep current password.') }}</p>
        @endif
    </div>

    <!-- Confirm Password Field -->
    <div>
        <label class="block text-sm font-semibold text-zinc-300" for="password_confirmation">{{ __('Confirm Password') }}</label>
        <input id="password_confirmation" name="password_confirmation" type="password" 
            class="mt-1 block w-full rounded border-zinc-700 bg-zinc-800 text-white focus:border-blue-500 focus:ring-blue-500 placeholder-zinc-500 shadow-sm px-3 py-2" {{ isset($user) ? '' : 'required' }}>
    </div>

    <!-- Role Field -->
    <div>
        <label class="block text-sm font-semibold text-zinc-300" for="role">{{ __('Role') }}</label>
        <select id="role" name="role" class="mt-1 block w-full rounded border-zinc-700 bg-zinc-800 text-white focus:border-blue-500 focus:ring-blue-500 placeholder-zinc-500 shadow-sm px-3 py-2" required>
            <option value="" class="text-zinc-500">{{ __('Select a role') }}</option>
            @foreach($roles as $role)
                <option value="{{ $role->name }}" {{ $selectedRole === $role->name ? 'selected' : '' }}>
                    {{ $role->name }}
                </option>
            @endforeach
        </select>
        @error('role')
            <p class="mt-2 text-sm text-red-400 font-medium">{{ $message }}</p>
        @enderror
    </div>
</div>