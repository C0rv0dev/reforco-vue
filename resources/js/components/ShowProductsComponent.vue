<script>
    export default {
        props: ['product'],

        data: function ()
        {
            return {
                newName: '',
                newProduct: this.product,
                isEditing: false
            }
        },

        methods: {
            editProduct()
            {
                axios.put(`products/${this.product.id}`, (this.newProduct.name = this.newName, this.newProduct))
                    .then(response=>{
                        this.isEditing = false
                    })
            },
        }
    }
</script>

<template>
    <div class="container mb-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <button @click="$emit('deleteProduct')" class="btn btn-sm btn-danger me-2 float-end"><font-awesome-icon icon="fa-solid fa-trash"></font-awesome-icon></button>
                        <button @click="isEditing = true" class="btn btn-sm btn-warning me-2 float-end"><font-awesome-icon icon="fa-solid fa-edit"></font-awesome-icon> Edit</button>

                        <span v-if="(!isEditing)">{{ product.name }}</span>
                        <div v-if="isEditing">
                            <input class="form-control w-50" type="text" name="newProduct" v-model="newName">
                        </div>
                    </div>

                    <div class="card-body">
                        <div v-if="(!isEditing)">
                            Price: ${{ product.price }}
                            <div class="float-end">Quantity: {{ product.quantity }}</div>
                        </div>

                        <div v-if="isEditing">
                            <input class="form-control w-50 float-start" type="text" name="newProductPrice" v-model="newProduct.price">
                            <input class="form-control w-50 float-end" type="text" name="newProductQuantity" v-model="newProduct.quantity">
                            <button @click="editProduct(), $emit('clear')" class="btn btn-sm float-end btn-success mt-3">Save</button>
                            <button @click="isEditing = false" class="btn btn-sm float-start btn-danger mt-3">Cancel</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>