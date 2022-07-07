import Home from './components/Home'
import ProductIndex from './components/products/Index';
import ProductCreate from './components/products/Create';
import ProductEdit from './components/products/Edit';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'products',
        path: '/products',
        component: ProductIndex
    },
    {
        name: 'create',
        path: '/create',
        component: ProductCreate
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: ProductEdit
    }
];
