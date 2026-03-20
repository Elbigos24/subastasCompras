@extends('Dashboard.main')
@section('contenido')

@include('Dashboard.partials.alerts')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold m-0">Compras</h2>
    <a href="{{ route('compras.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Nueva Compra
    </a>
</div>

<div class="table-card">
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Monto Total</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($compras as $compra)
                <tr>
                    <td>{{ $compra->id }}</td>
                    <td>{{ $compra->user->name ?? 'N/A' }}</td>
                    <td>${{ number_format($compra->amount, 2) }}</td>
                    <td>{{ $compra->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('compras.show', $compra) }}" class="btn btn-sm btn-info text-white">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('compras.edit', $compra) }}" class="btn btn-sm btn-warning text-white">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('compras.destroy', $compra) }}" method="POST" class="d-inline form-delete">
                            @csrf @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger btn-eliminar">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">No hay compras registradas.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-3">{{ $compras->links() }}</div>
</div>

<script>
document.querySelectorAll('.btn-eliminar').forEach(btn => {
    btn.addEventListener('click', function () {
        const form = this.closest('.form-delete');
        Swal.fire({
            title: '¿Eliminar compra?',
            text: 'También se eliminarán los ítems y pagos asociados.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar',
        }).then(result => { if (result.isConfirmed) form.submit(); });
    });
});
</script>
@endsection
