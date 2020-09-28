<template>
<div>
    <div class="card">
        <div class="card-header">
            Realizar Saque
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="col-4">
                    <div class="form-group">
                        <label>Agência</label>
                        <input type="text" class="form-control" v-model="agencia"
                               placeholder="Insira o número da agência com o digito">

                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Conta (Dê enter para continuar)</label>
                        <input type="text" class="form-control" v-model="conta" @keyup.enter="buscarCorrentista"
                               placeholder="Insira o nome da conta com o digíto">
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label>Tipo de Conta</label>
                        <input type="text" class="form-control" v-model="tipo_conta"
                               placeholder="Corrente ou poupanca" readonly>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nome do correntista" readonly v-model="nome">
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <label>Saldo em Conta</label>
                        <input type="number" class="form-control" placeholder="0.00"  v-model="saldo" readonly>

                    </div>
                </div> <div class="col-3">
                    <div class="form-group">
                        <label>Valor Saque</label>
                        <input type="number" class="form-control" placeholder="0.00"  v-model="valor">

                    </div>
                </div>

            </div>


            <button type="submit" class="btn btn-primary" @click="sacar()" v-show="arrayCorrentista.length  && parseFloat(valor) <= parseFloat(saldo)">Realizar Saque</button>
            <small class="form-text text-muted">Confira os dados antes de confirmar o saque.</small>

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
                arrayCorrentista:[]
            }
        },
        methods: {
            buscarCorrentista() {
                let me = this;
                var url = '/api/buscarCorrentista?agencia=' + me.agencia + '&conta='+me.conta;
                axios.get(url).then(function (response) {
                    var resposta = response.data;
                    me.arrayCorrentista = resposta.correntista;
                    if (me.arrayCorrentista.length > 0) {
                        me.idconta = me.arrayCorrentista[0]['idconta'] ;
                        me.tipo_conta = (me.arrayCorrentista[0]['tipo_conta'] ==='P'? 'Poupança': 'Corrente') ;
                        me.saldo = me.arrayCorrentista[0]['saldo'] ;
                        me.nome = me.arrayCorrentista[0]['nome'] +' - ' + me.arrayCorrentista[0]['cpf'];
                    } else {
                        alert('Correntista não encontrado')

                    }


                })
                    .catch(function (error) {
                        console.log(error);
                    });


            },
            sacar() {
                let me =this;
                axios.post('/api/saqueConta', {
                    'idconta': this.idconta,
                    'valor': this.valor,
                })
                    .then(function (response) {
                        console.log(response);
                        alert("Saque realizado com sucesso!");
                        me.agencia='';
                        me.conta='';
                        me.nome='';
                        me.tipo_conta='';
                        me.valor=0.00;
                        me.saldo=0.00;
                        me.idconta=0;
                        me.arrayCorrentista=[];


                    })
                    .catch(function (error) {
                        console.log(error);
                        alert("Ocorreu um erro")
                    });


            },
        },
    }
</script>

<style scoped>

</style>
