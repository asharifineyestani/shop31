<template>
    <div>
        <table class="table table-responsive-sm">
            <tbody>
            <tr v-for="item in data">

                <template v-if="editRow.id == item.id">
                    <td>{{item.id}}</td>
                    <td><input v-model="editRow.title" type="text"></td>
                    <td>
                        <button
                            class="btn btn-sm btn-success"
                            type="button"
                            @click="update(editRow)">
                            Submit
                        </button>
                        <button
                            class="btn btn-sm btn-danger"
                            type="button"
                            @click="reset">
                            Cancel
                        </button>
                    </td>


                </template>
                <template v-else>
                    <td>{{item.id}}</td>
                    <td>{{item.title}}</td>
                    <td>

                        <div v-if="Object.keys(editRow).length === 0 && creatInput === false">
                            <button class="btn btn-sm btn-primary" type="button"
                                    @click="edit(item)"
                            >Edit
                            </button>
                            <button
                                class="btn btn-sm btn-danger"
                                type="button"
                                @click="destroy(item)"
                            >
                                Delete
                            </button>
                        </div>

                    </td>
                </template>


            </tr>


            <tr v-if="creatInput === false">

                <td>

                    <button class="btn btn-ghost-success"
                            type="button"
                            @click="create()">
                        +
                    </button>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr v-else>
                <td>
                    <span class="badge badge-danger">New</span>
                </td>
                <td>
                    <input class="form-control" v-model="newRow.title" type="text" placeholder="Enter your name">

                </td>
                <td>
                    <button
                        class="btn btn-sm btn-success"
                        type="button"
                        @click="store"
                    >
                        Create
                    </button>
                    <button
                        class="btn btn-sm btn-danger"
                        type="button"
                        @click="reset">
                        Cancel
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

    import axios from 'axios'


    export default {
        data() {
            return {
                data: [],
                editRow: {},
                newRow: {},
                editId: null,
                creatInput: false,
                entityId: window.location.href.split('/')[4]
            }
        },
        created() {
            this.get();
        },
        methods: {

            get() {
                axios
                    .get('/api/v1/shop/options?filters[attribute_id]=' + this.entityId)
                    .then(response => (this.data = response.data))
            },

            onEdit(product) {

            },
            update(item) {
                axios
                    .put('/api/v1/shop/options/' + item.id, this.editRow)


                this.reset()
            },

            store() {
                this.newRow.attribute_id = this.entityId;
                axios
                    .post('/api/v1/shop/options/', this.newRow)

                this.reset()
            },

            destroy(item) {
                axios
                    .delete('/api/v1/shop/options/' + item.id)

                this.reset()
            },
            onreset() {

            },
            edit(item) {
                this.editRow = item
            },

            reset() {
                this.editRow = {}
                this.creatInput = false
                this.get()
            },

            create() {
                this.editRow = {}
                this.creatInput = true
            }

        }
    }
</script>
