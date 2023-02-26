<script>
    export default {
        props: ['product'],
    }
</script>

<template>
    <div class="container mb-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <button @click="$emit('deleteProduct')" class="btn btn-sm btn-danger me-2 float-end">Delete</button>
                        <button class="btn btn-sm btn-warning me-2 float-end">Edit</button>
                        <button class="btn btn-sm btn-info me-2 float-end">Notes</button>
                        {{ product.name }}
                    </div>

                    <div class="card-body">
                        Price: ${{ product.price }}
                        <div class="float-end">Quantity: {{ product.quantity }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>