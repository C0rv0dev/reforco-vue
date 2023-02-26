<script>
    export default {

        props: ['products'],

        data: function()
        {
            return {
                list: this.products
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
            }
        }
    }
</script>

<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
                <div v-for="(product, index) in list">
                    <show-products-component
                        :product = product
                        @deleteProduct="deleteProduct(product, index)"
                    >
                    </show-products-component>
                </div>
            <create-products-component
                @save="(product)=>storeProduct(product)"
            >
            </create-products-component>
        </div>
    </div>
</template>