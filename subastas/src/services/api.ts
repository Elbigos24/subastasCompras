import axios from 'axios';

//url base
const API_URL = import.meta.env.VITE_API_URL;

//sin token
export const api = axios.create({
    baseURL: API_URL,
    headers:{
        "Content-Type":'application/json'
    }
})

//con token
export const apiAuth=axios.create({
    baseURL: API_URL,
    headers:{
        "Content-Type":'application/json'
    }
})