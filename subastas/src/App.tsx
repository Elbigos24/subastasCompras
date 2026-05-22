

import './App.css'
import { BrowserRouter, Route, Routes } from 'react-router-dom'
import Layout from './layouts/Layout'
import Contacto from './views/contacto'
import Home from './views/Home'
import Carrito from './views/Carrito'
import Detalles from './views/Detalles'
import Login from './views/Login'
import ProtectedRoute from './layouts/ProtectedRoute'
import Checkout from './views/Checkout'

function App() {
  

  return (
    <>
      <BrowserRouter>
        <Routes>
          <Route element={<Layout />}>
            <Route path='/' element={<Home />} />
            <Route path='/contacto' element={<Contacto />} />
            <Route path='/carrito' element={<Carrito />} />
            <Route path='/Detalles/:slug' element={<Detalles />} />
            <Route path='/protected' element={<ProtectedRoute><Checkout /></ProtectedRoute>} />
            <Route path='/login' element={<Login />} />
          </Route>

        </Routes>
      </BrowserRouter>
    </>
  )
}

export default App
