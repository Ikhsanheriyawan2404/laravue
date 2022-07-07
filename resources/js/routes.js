import Home from './components/Home'
import ProductIndex from './components/products/Index';
import ProductCreate from './components/products/Create';
import ProductEdit from './components/products/Edit';
import CustomerIndex from './components/customers/Index';
import CustomerCreate from './components/customers/Create';
import CustomerEdit from './components/customers/Edit';
import SalesOrderIndex from './components/sales_orders/Index';
import SalesOrderCreate from './components/sales_orders/Create';
import SalesOrderEdit from './components/sales_orders/Edit';

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
        name: 'product-create',
        path: '/products/create',
        component: ProductCreate
    },
    {
        name: 'product-edit',
        path: '/products/edit/:id',
        component: ProductEdit
    },
    {
        name: 'customers',
        path: '/customers',
        component: CustomerIndex
    },
    {
        name: 'customer-create',
        path: '/customers/create',
        component: CustomerCreate
    },
    {
        name: 'customer-edit',
        path: '/customers/edit/:id',
        component: CustomerEdit
    },
    {
        name: 'sales_orders',
        path: '/sales',
        component: SalesOrderIndex
    },
    {
        name: 'sales-create',
        path: '/sales/create',
        component: SalesOrderCreate
    },
    {
        name: 'sales-edit',
        path: '/sales/edit/:id',
        component: SalesOrderEdit
    }
];
