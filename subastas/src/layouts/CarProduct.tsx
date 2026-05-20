import { useEffect, useState } from "react";

interface Props {
    item: any
    onUpdateQuantity: (item: any, quantity: any) => void
    onDeleteItem: (item: any) => void
}

export default function CarProduct({ item, onUpdateQuantity, onDeleteItem }: Props) {
    const url_assets = import.meta.env.VITE_API_ASSETS;
    const [quantity, setQuantity] = useState(1);
    const [subtotal, setSubtotal] = useState(0);

    useEffect(() => {
        setQuantity(item.quantity);
        setSubtotal(item.price * item.quantity);
    },[])
    const updateQuantity = (_quantity: number) => {
        var calculo = item.price * _quantity
        setSubtotal(calculo);
        setQuantity(_quantity);
        onUpdateQuantity(item, _quantity);
    }
    return (<>

        <div className="d-flex align-items-center justify-content-between border-bottom pb-4 mb-4">
            <div className="d-flex align-items-center">
                {/* Miniatura */}
                <div className="bg-light overflow-hidden me-4" style={{ width: '90px', height: '90px', borderRadius: '4px' }}>
                    <img src={`${url_assets}/images/${item.img}`}
                        alt="Leica M6"
                        className="w-100 h-100 object-fit-cover"
                        style={{ mixBlendMode: 'multiply' }}>
                    </img>
                </div>
                {/* Detalles */}
                <div>
                    <h3 className="h6 fw-bold mb-1 text-dark" style={{ fontSize: '1rem' }}>{item.name}</h3>
                    <p className="text-muted small mb-0" style={{ fontSize: '0.85rem' }}>Subasta finalizada • ID #8492</p>
                    <button className="btn btn-link p-0 text-muted small text-decoration-none mt-2" style={{ fontSize: '0.8rem', border: 'none', background: 'transparent' }}
                        onClick={() => { onDeleteItem(item); }}>
                        Eliminar
                    </button>
                </div>
            </div>
            <div className="input-group" style={{ width: '130px', height: '50px' }}>
                <button className="btn btn-outline-dark rounded-0 border-end-0" type="button"
                    onClick={() => {
                        if (quantity > 1) {
                            updateQuantity(quantity - 1);
                        }
                    }

                    }
                    style={{ borderColor: '#ddd' }}>−</button>
                <input type="text" className="form-control text-center border-dark rounded-0 fw-bold" value={quantity} onChange={(evt: any) => (updateQuantity(evt.target.value))} readOnly style={{ borderColor: '#ddd', color: '#1a1a1a' }} />
                <button className="btn btn-outline-dark rounded-0 border-start-0" type="button"
                    onClick={() => {
                        if (quantity <= item.stock) {
                            updateQuantity(quantity + 1);
                        }
                    }

                    }
                    style={{ borderColor: '#ddd' }}>+</button>
            </div>
            {/* Precio */}
            <span className="fw-bold text-dark" style={{ fontSize: '1.1rem' }}>${subtotal} MXN</span>
        </div>
    </>
    )
}