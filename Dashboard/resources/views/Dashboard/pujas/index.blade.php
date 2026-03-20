@extends('Dashboard.main')
@section('contenido')

@include('Dashboard.partials.alerts')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold m-0">Pujas</h2>
    <a href="{{ route('pujas.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Nueva Puja
    </a>
</div>

<div class="table-card">
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Subasta</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Fecha y Hora</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pujas as $puja)
                <tr>
                    <td>{{ $puja->id }}</td>
                    <td>{{ $puja->user->name ?? 'N/A' }}</td>
                    <td>#{{ $puja->subasta_id }}</td>
                    <td>{{ $puja->amount }}</td>
                    <td>${{ number_format($puja->price, 2) }}</td>
                    <td>{{ \Carbon\Carbon::parse($puja->date_hour)->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('pujas.show', $puja) }}" class="btn btn-sm btn-info text-white">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('pujas.edit', $puja) }}" class="btn btn-sm btn-warning text-white">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('pujas.destroy', $puja) }}" method="POST" class="d-inline form-delete">
                            @csrf @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger btn-eliminar">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">No hay pujas registradas.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-3">{{ $pujas->links() }}</div>
</div>

<script>
document.querySelectorAll('.btn-eliminar').forEach(btn => {
    btn.addEventListener('click', function () {
        const form = this.closest('.form-delete');
        Swal.fire({
            title: '¿Eliminar puja?',
            text: 'Esta acción no se puede deshacer.',
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
