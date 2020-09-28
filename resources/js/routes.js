import Extrato from './components/Extrato';
import Deposito from "./components/Deposito";
import Saque from "./components/Saque";
import Saldo from "./components/Saldo";

const routes = [
    {
        path: '/deposito',
        component: Deposito,
    },
    {
        path: '/saldo',
        component: Saldo,
    },
    {
        path: '/extrato',
        component: Extrato,

    },
    {
        path: '/saque',
        component: Saque,

    },

];
export default routes;
