# Crear Modelo - Migracion - Factory
```bash
pa make:model Mascota -mf
```

# Crear Livewire
```bash
pa make:livewire Users/Index
```

# Configurar route
```php
Route::get('/usuarios', action: Index::class)->name('users.index')->middleware(['auth', 'verified']);
```

# Crear policy:
```bash
pa make:policy UserPolicy --model=User
```