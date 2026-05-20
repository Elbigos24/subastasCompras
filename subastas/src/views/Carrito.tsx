import { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";
import CarProduct from "../layouts/CarProduct";

export default function Carrito() {
    const [data, setData] = useState([]);
    const navigate = useNavigate();
    const [subtotal, setSubtotal] = useState(0);
    const seguirComprando = () => {
        navigate("/");
    }
    useEffect(() => {
        if (localStorage.getItem("subastas_cart")) {
            var items = JSON.parse(localStorage.getItem("subastas_cart") as string);
            var calculo = 0;
            items.map((item: any) => {
                calculo += (item.price * item.quantity);
            })
            setSubtotal(calculo);
            setData(items);
        }
    }, [])
    const onUpdateQuantity = (item: any, quantity: any) => {
        {/*console.log(item,quantity);*/ }
        var calculo = 0;
        const data_copy=data.map((_item: any) => {
            if(_item.id==item.id){
             return{
                ..._item,
                quantity: quantity
             }   
            }
            return _item
        })
        data_copy.map((_item: any) => {
            calculo += (_item.price * _item.quantity);
        })
        setSubtotal(calculo);
        setData(data_copy);
        localStorage.setItem("subastas_cart", JSON.stringify(data_copy));
    }
    const onDeleteItem=(item:any)=>{
        var calculo = 0;
        const data_copy=data.filter((_item: any) => _item.id!=item.id);
        data_copy.map((_item: any) => {
            calculo += (_item.price * _item.quantity);
        })
        setSubtotal(calculo);
        setData(data_copy);
        localStorage.setItem("subastas_cart", JSON.stringify(data_copy));
    }
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

                            {/* Artículos carrito */}
                            {data.map((item: any) => <CarProduct item={item} key={item.id} 
                            onUpdateQuantity={onUpdateQuantity} 
                            onDeleteItem={onDeleteItem}
                            />)}

                            <button className="btn w-100 text-white rounded-0 py-3" style={{ backgroundColor: '#000000', fontSize: '0.9rem', fontWeight: '500', border: 'none', transition: 'opacity 0.2s ease' }} onClick={seguirComprando}>
                                Seguir comprando

                            </button>

                        </div>

                        {/* Resumen de Pago (Columna Derecha) */}
                        <div className="col-lg-4 offset-lg-1">
                            <div className="p-4 bg-light" style={{ borderRadius: '4px' }}>
                                <h2 className="h5 fw-bold mb-4 text-dark" style={{ letterSpacing: '-0.01em' }}>Resumen</h2>

                                <div className="d-flex justify-content-between mb-3 small text-muted">
                                    <span>Subtotal de adjudicación</span>
                                    <span className="text-dark">${subtotal.toFixed(2)} MXN</span>
                                </div>

                                <div className="d-flex justify-content-between mb-3 small text-muted">
                                    <span>Tarifa de plataforma (2%)</span>
                                    <span className="text-dark">${(subtotal * 0.02).toFixed(2)} MXN</span>
                                </div>

                                <div className="d-flex justify-content-between mb-4 small text-muted">
                                    <span>Envío asegurado</span>
                                    <span className="text-dark">Gratis</span>
                                </div>

                                <div className="d-flex justify-content-between border-top pt-3 mb-4">
                                    <span className="fw-bold text-dark">Total estimado</span>
                                    <span className="fw-bold text-dark" style={{ fontSize: '1.2rem' }}>${(subtotal * 1.02).toFixed(2)} MXN</span>
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