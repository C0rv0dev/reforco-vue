<script>
    export default {

        props: {
            show: Boolean
        },

        data: function()
        {
            return {
                productName: '',
                productPrice: '',
                productQuantity: ''
            }
        },

        methods: 
        {
            saveMessage()
            {
                axios.post('/products', {productName: this.productName, productPrice: this.productPrice, productQuantity: this.productQuantity})
                    .then(response=>{
                        this.$emit('save',response.data.product)
                    })
            }
        }
    }
</script>

<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Register a New Product Here
                    </div>

                    <div class="card-body">
                        {{ show }}
                        <input class="form-control" type="text" placeholder="Product Name" name="p_name" v-model="productName">
                        <input class="form-control mt-3 w-50 float-end" type="text" placeholder="Price" name="p_price" v-model="productPrice">
                        <input class="form-control mt-3 w-50 float-start" type="text" placeholder="Quantity" name="p_quantity" v-model="productQuantity">
                        <button @click="$emit('close')" class="btn btn-danger mt-3">Cancel</button>
                        <button @click="saveMessage(), $emit('close')" class="btn btn-success mt-3 float-end">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>