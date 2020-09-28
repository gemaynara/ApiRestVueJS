<template>
    <div>
        <div class="card">
            <div class="card-header">
                Verificar Saldo
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
                <h5 class="card-title">{{nome}}</h5>
                <p class="card-text">CPF: {{cpf}} </p>
                <p class="card-text">Agência: {{agencia}} - Conta {{tipo_conta}} : {{conta}} </p>
                <p class="card-text">Saldo R$ {{saldo}}</p>

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


            },
            sacar() {
                axios.post('/api/saqueConta', {
                    'idconta': this.idconta,
                    'valor': this.valor,
                })
                    .then(function (response) {
                        console.log(response);
                        alert("Saque realizado com sucesso!");
                        this.agencia='';
                        this.conta='';
                        this.tipo_conta='';
                        this.valor=0.00;
                        this.idconta=0;
                        this.arrayCorrentista=[];


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
