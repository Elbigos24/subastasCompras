@extends('Dashboard.main')
@section('contenido')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold m-0">Nueva Puja</h2>
    <a href="{{ route('pujas.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-1"></i> Volver
    </a>
</div>

<div class="table-card p-4">
    <form action="{{ route('pujas.store') }}" method="POST">
        @csrf

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Usuario <span class="text-danger">*</span></label>
                <select name="user_id" class="form-select @error('user_id') is-invalid @enderror">
                    <option value="">-- Seleccionar usuario --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold">Subasta activa <span class="text-danger">*</span></label>
                <select name="subasta_id" class="form-select @error('subasta_id') is-invalid @enderror">
                    <option value="">-- Seleccionar subasta --</option>
                    @foreach($subastas as $subasta)
                        <option value="{{ $subasta->id }}" {{ old('subasta_id') == $subasta->id ? 'selected' : '' }}>
                            #{{ $subasta->id }} — {{ $subasta->product->name ?? 'N/A' }}
                        </option>
                    @endforeach
                </select>
                @error('subasta_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Cantidad <span class="text-danger">*</span></label>
                <input type="number" name="amount" value="{{ old('amount') }}" min="1"
                    class="form-control @error('amount') is-invalid @enderror"
                    placeholder="1">
                @error('amount')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Precio de puja <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" name="price" value="{{ old('price') }}" min="1"
                        class="form-control @error('price') is-invalid @enderror"
                        placeholder="0">
                </div>
                @error('price')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Fecha y hora <span class="text-danger">*</span></label>
                <input type="datetime-local" name="date_hour" value="{{ old('date_hour') }}"
                    class="form-control @error('date_hour') is-invalid @enderror">
                @error('date_hour')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mt-4 d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-1"></i> Registrar Puja
            </button>
            <a href="{{ route('pujas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
