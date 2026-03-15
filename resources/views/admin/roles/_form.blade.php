@php
    $guardValue = old('guard_name', $role->guard_name ?? 'web');
@endphp

<div class="grid gap-6">
    <!-- Role Name -->
    <div>
        <label class="block text-sm font-semibold text-zinc-300" for="name">{{ __('Role Name') }}</label>
        <input id="name" name="name" type="text" value="{{ old('name', $role->name ?? '') }}" 
            class="mt-1 block w-full rounded-lg border-zinc-700 bg-zinc-800 text-white focus:border-blue-500 focus:ring-blue-500 placeholder-zinc-500 shadow-sm transition-colors px-3 py-2" placeholder="e.g. Manager" required>
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

    <!-- Permissions -->
    <div>
        <label class="block text-sm font-semibold text-zinc-300 mb-2">{{ __('Permissions') }}</label>
        <div class="space-y-2 max-h-60 overflow-y-auto px-3 py-2 bg-zinc-800 rounded-lg border border-zinc-700">
            @foreach($permissions as $permission)
                <div class="flex items-center">
                    <input id="perm-{{ $permission->id }}" name="permissions[]" type="checkbox" value="{{ $permission->name }}"
                        class="h-4 w-4 text-blue-600 bg-zinc-700 border-zinc-600 focus:ring-blue-500" 
                        {{ isset($role) && $role->hasPermissionTo($permission) ? 'checked' : '' }}>
                    <label for="perm-{{ $permission->id }}" class="ml-2 block text-sm text-white">
                        {{ $permission->name }}
                    </label>     
                </div>       
            @endforeach
        </div>
        @error('permissions')
            <p class="mt-2 text-sm text-red-400 font-medium">{{ $message }}</p>
        @enderror
    </div>  
</div>