<template>
    <div>
        <div class="container">
            <div class="row mt-5">
                <div class="col-6">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Easy calculator!</h4>
                        <p>Enter 2 numbers and select the operation</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="alert alert-danger" role="alert" v-cloak v-if="error !==null">
                        {{error}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-row">
                        <div class="form-group col-4">
                            <input type="number" class="form-control form-control-lg" id="firstNumber" v-model.number="firstNumber" @input="runAction">
                        </div>
                        <div class="form-group col-4">
                            <select id="action" class="form-control form-control-lg" v-model="action" v-on:click="runAction">
                                <option value="addition" selected>&#128125</option>
                                <option value="subtraction">&#128128</option>
                                <option value="multiplication">&#128123</option>
                                <option value="division">&#128561</option>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <input type="number" class="form-control form-control-lg" id="lastNumber" v-model.number="lastNumber" @input="runAction">
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group row">
                        <label for="total" class="col-4 col-form-label form-control-lg">Total:</label>
                        <div class="col-8">
                            <input type="number" class="form-control form-control-lg" id="total" disabled v-model="total">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return{
                firstNumber: 0,
                lastNumber: 0,
                action: "addition",
                actionUrl: "calculate",
                total: 0,
                error: null,
            }
        },
        methods: {
            sendData: function (firstNumber, lastNumber, action, actionUrl) {
                const formData = new FormData();
                formData.append('firstNumber', firstNumber);
                formData.append('lastNumber', lastNumber);

                // Url для виконання запититу. Він залежиться від вибраної арифметичної дії
                let url = actionUrl + "/" + action;

                axios.post(url, formData)
                    .then(response => {
                        let data = response.data;
                        this.updateTotal(data);
                        this.updateError(null);
                    })
                    .catch(error => {
                        this.updateTotal(0);
                        this.updateError(error.response.data);
                    });
            },
            updateTotal: function(data){
                this.total = data;
            },
            updateError: function (data) {
                this.error = data;
            },
            runAction: function () {
                this.sendData (this.firstNumber, this.lastNumber, this.action, this.actionUrl);
            }
        },
    }
</script>
