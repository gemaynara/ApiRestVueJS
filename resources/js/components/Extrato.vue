<template>
<div>
    <div class="card">
        <div class="card-header">
            Ver Extrato
        </div>
        <div class="card-body">
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <label class="sr-only" >Agência</label>
                    <input type="text" class="form-control mb-2" v-model="agencia" placeholder="Agência com digito">
                </div>
                <div class="col-auto">
                    <label class="sr-only">Número Conta</label>
                    <input type="text" class="form-control mb-2" v-model="conta" placeholder="Conta com digito">
                </div>

                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2" @click="buscarConta">Buscar</button>
                </div>
            </div>

        </div>
        <div class="card-body" v-show="arrayCorrentista.length">
                <p class="card-text">Saldo em conta: R$ {{saldo}}</p>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Valor</th>
                </tr>
                </thead>
                <tbody v-if="arrayExtrato.length">

                <tr v-for="e in arrayExtrato" :key="e.id">
                    <th scope="row">{{e.data}}</th>
                    <td>{{e.tipo ==='S'? "Saque": "Depósito"}}</td>
                    <td>R$ {{e.valor}}</td>

                </tr>
                </tbody>
                <tbody v-else>
                <tr >
                    <th colspan="3">Sem histórico de movimentações</th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                idconta:0,
                valor:0.00,
                saldo:0.00,
                agencia: '',
                conta: '',
                tipo_conta: '',
                nome:'',
                arrayCorrentista:[],
                arrayExtrato:[]
            }
        },
        methods: {
            buscarConta() {
                let me = this;
                var url = '/api/buscarCorrentista?agencia=' + me.agencia + '&conta='+me.conta;
                axios.get(url).then(function (response) {
                    var resposta = response.data;
                    me.arrayCorrentista = resposta.correntista;
                    if (me.arrayCorrentista.length > 0) {
                        me.idconta = me.arrayCorrentista[0]['idconta'] ;
                        me.tipo_conta = (me.arrayCorrentista[0]['tipo_conta'] ==='P'? 'Poupança': 'Corrente') ;
                        me.saldo = me.arrayCorrentista[0]['saldo'] ;
                        me.nome = me.arrayCorrentista[0]['nome'];
                        me.cpf = me.arrayCorrentista[0]['cpf'];
                    } else {
                        alert('Correntista não encontrado')

                    }


                })
                    .catch(function (error) {
                        console.log(error);
                    });

                var urld =  '/api/extratoConta?agencia=' + me.agencia + '&conta='+me.conta;
                axios.get(urld).then(function (response) {
                    var resposta = response.data;
                    me.arrayExtrato = resposta.extrato;
                })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

        },
    }
</script>

<style scoped>

</style>
