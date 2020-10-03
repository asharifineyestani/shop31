<template>
    <div>


        <div v-for="item in category.attributes" :key="item.id">
            <div class="form-group">
                <label>{{item.title}}</label>
                <template v-if="item.type === 'RADIO'">
                    <v-select
                        taggable
                        push-tags
                        label="title"
                        :options="item.options"
                    ></v-select>
                </template>

                <template v-else-if="item.type === 'TEXTAREA'">
                    <input type="textarea">
                </template>

                <template v-else-if="item.type === 'CHECKBOX'">
                    <v-select
                        taggable
                        multiple
                        label="title"
                        :options="item.options"
                    />
                </template>


                <template v-else>
                    <input class="form-control" type="text">
                </template>

            </div>
        </div>


    </div>


</template>

<script>

    import axios from 'axios'


    export default {
        data() {
            return {
                category: {},
                options: [
                    {
                        title: "HTML5",
                        author: {
                            firstName: "Remy",
                            lastName: "Sharp"
                        }
                    }
                ]
            }
        },


        created() {

            this.get()


        },


        methods: {
            async get() {
                await axios.get('/dev/tests/1').then((response) => {
                    this.category = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            },


        }
    }
</script>
