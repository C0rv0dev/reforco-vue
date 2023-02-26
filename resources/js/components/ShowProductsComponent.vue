<script>
    export default {
        props: ['products'],

        data: function()
        {
            console.log(this.list)
            return {
                list: this.products,
            }
        }
    }
</script>

<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div v-for="(product, index) in list" class="card">
                    <div class="card-header">
                        <button class="btn btn-sm btn-danger me-2 float-end">Delete</button>
                        <button class="btn btn-sm btn-warning me-2 float-end">Edit</button>
                        <button class="btn btn-sm btn-info me-2 float-end">Notes</button>
                        {{ product.name }}
                    </div>

                    <div class="card-body">
                        {{ product.price }}
                        {{ product.quantity }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>