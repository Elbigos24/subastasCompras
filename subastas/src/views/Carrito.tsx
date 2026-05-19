export default function Carrito() {

    return (
        <>
            {/* Contenido Principal: Carrito de Compras Minimalista */}
            <main className="py-5">
                <div className="container">
                    {/* Título de la Sección */}
                    <div className="row justify-content-center text-center mb-5">
                        <div className="col-lg-8">
                            <h1 className="display-4 fw-extrabold mb-2" style={{ fontWeight: 800, letterSpacing: '-0.03em', color: '#1a1a1a' }}>
                                Tu Selección
                            </h1>
                            <p className="lead text-muted" style={{ fontSize: '1.1rem', color: '#707070' }}>
                                Subastas ganadas y artículos listos para procesar.
                            </p>
                        </div>
                    </div>

                    <div className="row justify-content-center g-5">
                        {/* Lista de Productos (Columna Izquierda) */}
                        <div className="col-lg-7">
                            <div className="border-bottom pb-3 mb-4 d-none d-md-flex justify-content-between text-muted small text-uppercase tracking-wider" style={{ letterSpacing: '0.05em' }}>
                                <span>Objeto</span>
                                <span>Total</span>
                            </div>

                            {/* Artículo 1 */}
                            <div className="d-flex align-items-center justify-content-between border-bottom pb-4 mb-4">
                                <div className="d-flex align-items-center">
                                    {/* Miniatura */}
                                    <div className="bg-light overflow-hidden me-4" style={{ width: '90px', height: '90px', borderRadius: '4px' }}>
                                        <img src="https://images.unsplash.com/photo-1516035069371-29a1b244cc32?auto=format&fit=crop&w=200&q=80"
                                            alt="Leica M6"
                                            className="w-100 h-100 object-fit-cover"
                                            style={{ mixBlendMode: 'multiply' }}>
                                        </img>
                                    </div>
                                    {/* Detalles */}
                                    <div>
                                        <h3 className="h6 fw-bold mb-1 text-dark" style={{ fontSize: '1rem' }}>001. Leica M6 Cámara</h3>
                                        <p className="text-muted small mb-0" style={{ fontSize: '0.85rem' }}>Subasta finalizada • ID #8492</p>
                                        <button className="btn btn-link p-0 text-muted small text-decoration-none mt-2" style={{ fontSize: '0.8rem', border: 'none', background: 'transparent' }}>
                                            Eliminar
                                        </button>
                                    </div>
                                </div>
                                {/* Precio */}
                                <span className="fw-bold text-dark" style={{ fontSize: '1.1rem' }}>$2,100 USD</span>
                            </div>

                            {/* Artículo 2 */}
                            <div className="d-flex align-items-center justify-content-between border-bottom pb-4 mb-4">
                                <div className="d-flex align-items-center">
                                    {/* Miniatura */}
                                    <div className="bg-light overflow-hidden me-4" style={{ width: '90px', height: '90px', borderRadius: '4px' }}>
                                        <img src="https://images.unsplash.com/photo-1524592094714-0f0654e20314?auto=format&fit=crop&w=200&q=80"
                                            alt="Reloj"
                                            className="w-100 h-100 object-fit-cover"
                                            style={{ mixBlendMode: 'multiply' }}>
                                        </img>
                                    </div>
                                    {/* Detalles */}
                                    <div>
                                        <h3 className="h6 fw-bold mb-1 text-dark" style={{ fontSize: '1rem' }}>003. Reloj de Mano 'Luna'</h3>
                                        <p className="text-muted small mb-0" style={{ fontSize: '0.85rem' }}>Subasta finalizada • ID #3104</p>
                                        <button className="btn btn-link p-0 text-muted small text-decoration-none mt-2" style={{ fontSize: '0.8rem', border: 'none', background: 'transparent' }}>
                                            Eliminar
                                        </button>
                                    </div>
                                </div>
                                {/* Precio */}
                                <span className="fw-bold text-dark" style={{ fontSize: '1.1rem' }}>$1,400 USD</span>
                            </div>
                        </div>

                        {/* Resumen de Pago (Columna Derecha) */}
                        <div className="col-lg-4 offset-lg-1">
                            <div className="p-4 bg-light" style={{ borderRadius: '4px' }}>
                                <h2 className="h5 fw-bold mb-4 text-dark" style={{ letterSpacing: '-0.01em' }}>Resumen</h2>

                                <div className="d-flex justify-content-between mb-3 small text-muted">
                                    <span>Subtotal de adjudicación</span>
                                    <span className="text-dark">$3,500 USD</span>
                                </div>

                                <div className="d-flex justify-content-between mb-3 small text-muted">
                                    <span>Tarifa de plataforma (2%)</span>
                                    <span className="text-dark">$70 USD</span>
                                </div>

                                <div className="d-flex justify-content-between mb-4 small text-muted">
                                    <span>Envío asegurado</span>
                                    <span className="text-dark">Gratis</span>
                                </div>

                                <div className="d-flex justify-content-between border-top pt-3 mb-4">
                                    <span className="fw-bold text-dark">Total estimado</span>
                                    <span className="fw-bold text-dark" style={{ fontSize: '1.2rem' }}>$3,570 USD</span>
                                </div>

                                <button className="btn w-100 text-white rounded-0 py-3" style={{ backgroundColor: '#000000', fontSize: '0.9rem', fontWeight: '500', border: 'none', transition: 'opacity 0.2s ease' }}>
                                    Proceder al pago seguro
                                </button>

                                <p className="text-center text-muted small mt-3 mb-0" style={{ fontSize: '0.75rem' }}>
                                    Transacciones encriptadas bajo protocolos SSL de alta seguridad.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </>
    )
}