<template>


    <div class="row">

        <div class="col-sm-12">
            <div class="form-group">
                <label>عنوان محصول</label>
                <input
                    v-model="product.title"
                    class="form-control"
                    type="text">
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label>برند</label>
                <v-select
                    v-model="product.brand_id"
                    :reduce="record => record.id"
                    label="title"
                    :options="brands"
                ></v-select>
            </div>
        </div>


        <div class="col-sm-12">
            <div class="form-group">
                <label>دسته بندی</label>
                <v-select
                    v-model="product.category_id"
                    :reduce="record => record.id"
                    label="title"
                    :options="categories"
                    @input="setSelected"
                ></v-select>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div v-for="item in category.attributes" :key="item.id">
                <div class="form-group">
                    <label>{{item.title}}</label>


                    <template v-if="item.type === 'select'">
                        <v-select
                            v-model="product.details[item.id]"
                            :reduce="option => option.title"
                            taggable
                            push-tags
                            label="title"
                            :options="item.options"
                            :value="product.details[item.id]"
                        ></v-select>
                    </template>

                    <template v-else-if="item.type === 'multiple-select'">
                        <v-select
                            v-model="product.details[item.id]"
                            :reduce="option => option.title"
                            taggable
                            multiple
                            label="title"
                            :options="item.options"
                        />
                    </template>


                    <template v-else-if="item.type === 'textarea'">
                    <textarea class="form-control" id="textarea-input" name="textarea-input" rows="3"
                              placeholder="Content.."></textarea>
                    </template>

                    <template v-else-if="item.type === 'array-string'">


                        <div class="input-group">
                            <input
                                v-model="multipleSelectDrafts[item.id]"
                                class="form-control" id="username2" type="text" name="username2" placeholder="Username"
                                autocomplete="username">
                            <div class="input-group-append" @click="addToArray(item.id, multipleSelectDrafts[item.id])">
                                <span class="input-group-text">+</span>
                            </div>
                        </div>

                        <div style="padding: 10px">
                            <ul class="list-group" :key="componentKey">
                                <li
                                    v-for="(line , index) in product.details[item.id]" :key="index"
                                    class="list-group-item d-flex list-group-item-action justify-content-between align-items-center"
                                >
                                    {{line}}
                                    <span
                                        @click="removeFromArray(item.id, index)"
                                        class="badge badge-primary badge-pill"
                                    >-</span>
                                </li>
                            </ul>
                        </div>
                    </template>

                    <template v-else-if="item.type === 'boolean'">
                        <v-select
                            v-model="product.details[item.id]"
                            :reduce="b => b.value"
                            label="label"
                            :options="boolean"
                        ></v-select>
                    </template>

                    <template v-else>
                        <input
                            v-model="product.details[item.id]"
                            class="form-control"
                            type="text"
                        >
                    </template>

                </div>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div
                class="btn btn-block btn-success"
                type="submit"
                @click="storeProduct"

            >ارسال
            </div>
        </div>
    </div>


</template>

<script>

    import axios from 'axios'


    export default {
        data() {
            return {
                componentKey: 0,
                category: {},
                categories: [],
                brands: [],
                product: {
                    title: null,
                    details: {},
                },
                boolean: [
                    {
                        "label": "بله",
                        "value": true,
                    },
                    {
                        "label": "خیر",
                        "value": false,
                    }
                ],
                multipleSelectDrafts: [],
                entityId: window.location.href.split('/')[4]
            }
        },


        created() {

            this.get()

            axios
                .get('/api/v1/products/' + this.entityId)
                .then(response => {
                        this.product = response.data.data
                        this.setCategory(response.data.data.category_id);
                    }
                )


        },


        methods: {
            async get() {
                await axios.get('/api/v1/shop/config').then((response) => {
                    this.categories = response.data.categories;
                    this.brands = response.data.brands;
                }).catch(function (error) {
                    console.log(error);
                });
            },


            async setCategory(categoryId) {
                await axios.get(`/dev/tests/${categoryId}`).then((response) => {
                    this.category = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            },


            addToArray(attributeId, item) {
                if (!this.product.details.hasOwnProperty(attributeId)) {
                    this.product.details[attributeId] = [];
                }

                this.product.details[attributeId].push(item);
                console.log(this.product.details);

                this.forceRerender();


            },

            removeFromArray(attributeId, index) {
                this.product.details[attributeId].splice(index, 1)
                this.forceRerender();
            },


            forceRerender() {
                this.componentKey += 1;
            },


            setSelected(value) {
                this.setCategory(value)
            },

            storeProduct() {

                if(this.entityId > 0) {
                    axios
                        .put('/api/v1/shop/products/' + this.entityId, this.product)
                } else {
                    axios
                        .post('/api/v1/shop/products/', this.product)
                }


            }

        }
    }
</script>
