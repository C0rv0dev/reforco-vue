<script>
    export default {

        props: ['products'],

        data: function()
        {
            return {
                list: this.products,
                showCreateProduct: false,
                showList: true,
                selectedProduct: ''
            }
        },

        methods: 
        {
            storeProduct(product)
            {
                this.list.push(product)
            },

            deleteProduct(product, index)
            {
                if(confirm('Are you sure?')){
                    axios.delete(`/products/${product.id}`)
                        .then(response=>{
                            this.list.splice(index, 1)
                        })
                }
            },
            
        }
    }
</script>

<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            
            <div class="d-flex justify-content-center mb-3">
                <input type="text" class="w-50 form-control" v-model="selectedProduct">
                <label for="input" class="m-2"><font-awesome-icon icon="fa-solid fa-magnifying-glass"></font-awesome-icon></label>
            </div>
        
            <div v-for="(product, index) in list">           
                <div v-if="selectedProduct == ''">
                    <show-products-component
                        :product = product
                        @deleteProduct="deleteProduct(product, index)">
                    </show-products-component>    
                </div>

                <div v-if="product.name == selectedProduct">
                    <show-products-component
                        :product = product
                        @deleteProduct="deleteProduct(product, index)"
                        @clear="selectedProduct = ''">
                    </show-products-component>
                </div>

            </div>

            <div class="d-flex justify-content-center">
                <button @click="showCreateProduct = true" class="btn btn-success">
                    <font-awesome-icon icon="fa-solid fa-plus"></font-awesome-icon> 
                        Register Product
                </button>
            </div>
            <teleport to="body">
                <create-products-component
                    :show = showCreateProduct
                    @close = "showCreateProduct = false"
                    @save="(product)=>storeProduct(product)"
                >
                </create-products-component>
            </teleport>
        </div>
    </div>
</template>