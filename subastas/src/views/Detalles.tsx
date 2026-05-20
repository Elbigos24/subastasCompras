import { useEffect, useState } from "react"
import { api } from "../services/api";
import { useNavigate, useParams } from "react-router-dom";


export default function Detalles() {

    const [data, setData] = useState({}) as any;
    const [quantity, setQuantity] = useState(1);
    const [subtotal, setSubtotal] = useState(0);
    const { slug } = useParams();
    const navigate = useNavigate();


    useEffect(() => {
        getData();
    }, [])
    const getData = async () => {
        await api.get('/products/' + slug).then((res: any) => {
            console.log(res.data);
            var calculo = parseFloat(res.data.data.price) * 1
            setSubtotal(calculo);
            setData(res.data.data);

        }).catch((err: any) => {
            console.log(err);
        })
    }
    const updateQuantity = (_quantity: number) => {
        var calculo = data.price * _quantity
        setSubtotal(calculo);
        setQuantity(_quantity);
    }
    const addCar= () => {
        var array_cart = [];
        if(localStorage.getItem("subastas_cart")){
            array_cart = JSON.parse(localStorage.getItem("subastas_cart") as string);

        }
        array_cart.push({
            id: data.id,
            name: data.name,
            price: data.price,
            quantity: quantity,
            img: data.Img,
            stock: data.stock
        })
        localStorage.setItem("subastas_cart", JSON.stringify(array_cart));
       
        navigate("/carrito");
    }

    const url_assets = import.meta.env.VITE_API_ASSETS;
    return (
        <>

            <main className="py-5" style={{ backgroundColor: '#ffffff' }}>
                <div className="container">
                    <nav aria-label="breadcrumb" className="mb-4">
                        <ol className="breadcrumb small text-muted mb-0" style={{ background: 'transparent', padding: 0 }}>
                            <li className="breadcrumb-item"><a href="#" className="text-muted text-decoration-none" style={{ fontWeight: 300 }}>Catálogo</a></li>
                            <li className="breadcrumb-item active" aria-current="page" style={{ color: '#1a1a1a', fontWeight: 500 }}>Productos / {data.name}</li>

                        </ol>
                    </nav>

                    <div className="row g-5">
                        <div className="col-lg-7">
                            <div className="bg-light p-3" style={{ borderRadius: '4px' }}>
                                <img src={`${url_assets}/images/${data.Img}`}
                                    alt={data.name}
                                    className="img-fluid w-100"
                                    style={{ objectFit: 'cover', borderRadius: '2px' }} />
                                <p className="text-center text-muted small mt-2 mb-0" style={{ fontWeight: 300 }}>Visualización de productos.</p>
                            </div>
                        </div>

                        <div className="col-lg-5">
                            <div className="product-details">

                                <h1 className="display-5 fw-bold text-dark mb-3" style={{ fontWeight: 800, letterSpacing: '-0.03em' }}>{data.name}</h1>

                                <p className="h3 fw-bold text-dark mb-4" style={{ fontWeight: 700, letterSpacing: '-0.01em' }}>${data.price} MXN</p>
                                <p className="h3 fw-bold text-dark mb-4" style={{ fontWeight: 700, letterSpacing: '-0.01em' }}>Subtotal: ${subtotal} MXN</p>

                                <p className="lead text-muted mb-5" style={{ fontSize: '1rem', lineHeight: 1.7, color: '#707070' }}>
                                    {data.description}
                                </p>

                                <div className="d-flex align-items-center mb-5 gap-3">
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
                                                if (quantity <= data.stock) {
                                                    updateQuantity(quantity + 1);
                                                }
                                            }

                                            }
                                            style={{ borderColor: '#ddd' }}>+</button>
                                    </div>
                                    <button className="btn w-100 text-white rounded-0 py-3" style={{ backgroundColor: '#000000', fontSize: '0.95rem', fontWeight: 600, border: 'none', height: '50px' }} onClick={addCar}>
                                        AÑADIR AL CARRITO
                                    </button>
                                </div>



                                <div className="d-flex justify-content-between mt-5 pt-3 border-top text-muted small">
                                    <a href="#" className="text-muted text-decoration-none" style={{ fontWeight: 300 }}>Shipping & Payment Details</a>
                                    <a href="#" className="text-muted text-decoration-none" style={{ fontWeight: 300 }}>View Bid History</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </>
    )
}