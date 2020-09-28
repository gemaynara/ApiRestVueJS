<template>
    <div>
        <div class="card">
            <div class="card-header">
                Realizar Depósito
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
                            <label>Conta</label>
                            <input type="text" class="form-control" v-model="conta"
                                   placeholder="Insira o nome da conta com o digíto">
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label>Tipo de Conta (Selecione para continuar)</label>
                            <select class="form-control" v-model="tipo_conta" @change="buscarCorrentista">
                                <option value="">Selecione</option>
                                <option value="C">Corrente</option>
                                <option value="P">Poupança</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nome do correntista" readonly v-model="nome">
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label>Valor</label>
                            <input type="number" class="form-control" placeholder="0.00"  v-model="valor">

                        </div>
                    </div>

                </div>


                <button type="submit" class="btn btn-primary" @click="depositar()" v-show="arrayCorrentista.length">Depositar</button>
                <small class="form-text text-muted">Confira os dados antes de confirmar o depósito.</small>

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
                var url = '/api/buscarCorrentista?agencia=' + me.agencia + '&conta='+me.conta ;
                axios.get(url).then(function (response) {
                    var resposta = response.data;
                    me.arrayCorrentista = resposta.correntista;
                    if (me.arrayCorrentista.length > 0) {
                        me.idconta = me.arrayCorrentista[0]['idconta'] ;
                        me.tipo_conta = (me.arrayCorrentista[0]['tipo_conta'] ==='P'? 'Poupança': 'Corrente') ;
                        me.nome = me.arrayCorrentista[0]['nome'] +' - ' + me.arrayCorrentista[0]['cpf'];
                    } else {
                        alert('Correntista não encontrado')

                    }


                })
                    .catch(function (error) {
                        console.log(error);
                    });


            },
            depositar() {
                let me = this;
                axios.post('/api/depositoConta', {
                    'idconta': this.idconta,
                    'valor': this.valor,
                })
                    .then(function (response) {
                        console.log(response);
                        alert("Deposito realizado com sucesso!");

                        me.agencia='';
                        me.conta='';
                        me.tipo_conta='';
                        me.valor=0.00;
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
