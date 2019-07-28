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
                                <option value="+" selected>&#128125</option>
                                <option value="-">&#128128</option>
                                <option value="*">&#128123</option>
                                <option value="/">&#128561</option>
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
                action: "+",
                actionUrl: "calc",
                total: 0,
                error: null,
            }
        },
        methods: {
            sendData: function (firstNumber, lastNumber, action, actionUrl) {
                axios.post(actionUrl,
                    {
                        first_operand: firstNumber,
                        second_operand: lastNumber,
                        calc: action,
                    })
                    .then(response => {
                        let data = response.data;
                        this.updateTotal(data['result']);
                        this.updateError(null);
                    })
                    .catch(error => {
                        this.updateTotal(0);
                        let errorData = error.response.data;
                        this.updateError(errorData['message']);
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
