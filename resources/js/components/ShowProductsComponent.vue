<script>
    export default {
        props: ['product', 'notes'],

        data: function ()
        {
            return {
                newName: '',
                newNote: '',
                id: '',
                newProduct: this.product,
                isEditing: false,
                isCreatingNote: false
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

            saveNote()
            {
                axios.post(`products/${this.product.id}/notes`, {newNote: this.newNote, id: this.product.id})
                    .then(response=>{
                        this.$emit('saveNote', response.data.note)
                    })
            }
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
                        <button @click="isCreatingNote = true" class="btn btn-sm btn-primary me-2 float-end"><font-awesome-icon icon="fa-solid fa-note-sticky"></font-awesome-icon> Add Note</button>
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

                        
                        <div v-for="note in notes">
                            <div v-if="product.id == note.product_id">
                                <div class="text-black text-opacity-50 d-flex justify-content-end">
                                    {{ note.content }}
                                </div>
                            </div>
                        </div>

                        <div v-if="isEditing">
                            <input class="form-control w-50 float-start" type="text" name="newProductPrice" v-model="newProduct.price">
                            <input class="form-control w-50 float-end" type="text" name="newProductQuantity" v-model="newProduct.quantity">
                            <button @click="editProduct(), $emit('clear')" class="btn btn-sm float-end btn-success mt-3">
                                <font-awesome-icon icon="fa-solid fa-floppy-disk"></font-awesome-icon>
                            </button>
                            <button @click="isEditing = false" class="btn btn-sm float-start btn-danger mt-3">
                                <font-awesome-icon icon="fa-solid fa-xmark">
                                </font-awesome-icon>
                            </button>
                        </div>

                        <div v-if="isCreatingNote">
                            <input class="form-control mt-2" type="text" name="newNote" v-model="newNote">
                            <button @click="isCreatingNote = false" class="btn btn-danger btn-sm mt-2"><font-awesome-icon icon="fa-solid fa-xmark"></font-awesome-icon></button>
                            <button @click="isCreatingNote = false, saveNote()" class="btn btn-success btn-sm mt-2 float-end"><font-awesome-icon icon="fa-solid fa-floppy-disk"></font-awesome-icon></button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>